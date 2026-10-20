<?php

namespace App\Imports;

use App\Models\Position;
use App\Models\Profiles;
use App\Models\ProfilesTitle;
use App\Models\Users;
use App\Models\Asc;
use App\Models\Orgchart;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel, WithHeadingRow
{
    //use Importable,SkipsFailures;
    /**
    * @param array $row
    * @param Collection $collection
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = Users::where('username', $row['username'])->first();
        $positId = Position::where('position_title','like', '%' . $row['position'] . '%')->first();
        $profTitle = ProfilesTitle::where('prof_title','like', '%' . $row['prof_title'] . '%')->first();
        $ascCode = trim((string) ($row['asc_code'] ?? ''));

        $asc = Asc::where('asc_code', $ascCode)->first();

        $ascId = $asc?->asc_id;

        if (!$asc) {
            throw new \RuntimeException(
                "ไม่พบ asc_code '{$ascCode}' ในแถวข้อมูล Excel"
            );
        }

        // รองรับ org_id ที่เป็นทั้ง ID และ title
        $orgValue = trim((string) ($row['org_id'] ?? ''));

        $department = null;

        if ($orgValue !== '') {
            if (is_numeric($orgValue)) {
                $department = Orgchart::where('org_id', $orgValue)->first();
            }

            if (!$department) {
                $department = Orgchart::where('title', $orgValue)->first();
            }
        }

        $orgId = $department?->org_id;

        if (!$department) {
            throw new \RuntimeException(
                "ไม่พบหน่วยงาน '{$orgValue}' ในแถวข้อมูล Excel"
            );
        }
        if (!$positId) {
            throw new \Exception(
                'ไม่พบตำแหน่ง: ' . ($row['position'] ?? '')
            );
        }

        if (!$profTitle) {
            throw new \Exception(
                'ไม่พบคำนำหน้า: ' . ($row['prof_title'] ?? '')
            );
        }
        $userData = [
            'username' => $row['username'],
            'password' => Hash::make($row['password']),
            'email' => $row['email'],
            'position_id' => $positId->id,
            'employee_id' => $row['empcode'],
            'department_id' => $orgId,
            'asc_id' => $ascId,
        ];
        if ($user) {
            // ทำการอัพเดตข้อมูล User
            $user->update($userData);

            // อัพเดตข้อมูลใน Profile
            $user->Profiles()->update([
                'user_id' => $user->id,
                'firstname'=> $row['firstname'],
                'lastname'=> $row['lastname'],
                'firstname_en' => $row['firstname_en'],
                'lastname_en'=> $row['lastname_en'],
                'title_id' => $profTitle->id,
                'phone' =>$row['phone']
                // อัพเดตคอลัมน์อื่นๆ ใน Profile ตามต้องการ
            ]);
    } else {
            // หากไม่พบ User ที่มี username เดียวกัน ให้สร้าง User ใหม่
             $userData['create_at'] = Carbon::now();
            $userData['activkey'] = md5(
                microtime() . $row['password']
            );

            $user = Users::create($userData);
            Profiles::create([
                'user_id' => $user->id,
                'firstname'=> $row['firstname'],
                'lastname'=> $row['lastname'],
                'firstname_en' => $row['firstname_en'],
                'lastname_en'=> $row['lastname_en'],
                'title_id' => $profTitle->id,
                'phone' =>$row['phone']

            ]);
        }

    }
}
