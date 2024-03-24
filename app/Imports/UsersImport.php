<?php

namespace App\Imports;

use App\Models\Position;
use App\Models\Profiles;
use App\Models\ProfilesTitle;
use App\Models\Users;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class UsersImport implements ToModel, WithHeadingRow//ToCollection,
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
        if ($user) {
            // ทำการอัพเดตข้อมูล User
            $user->update([
                'username' =>  $row['username'],
                'password' => md5($row['password']),
                'email' => $row['email'],
                'position_id' =>$positId->id,
                'employee_id' =>$row['empcode'],
                // ทำการอัพเดตคอลัมน์อื่นๆ ตามต้องการ
            ]);

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
            $user = Users::create([
                'username' =>  $row['username'],
                'password' => md5($row['password']),
                'email' => $row['email'],
                'position_id' =>$positId->id,
                'employee_id' =>$row['empcode'],
                'create_at' => Carbon::now(),
                'activkey' => md5(microtime().$row['password']),
                // สร้างคอลัมน์อื่นๆ ของ User ตามต้องการ
            ]);
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
