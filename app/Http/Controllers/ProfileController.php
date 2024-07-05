<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Downloadtitle;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Profiles;
use App\Models\Users;
use App\Models\Company;
use App\Models\Division;
use App\Models\Position;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
   function profile(){
      if((Auth::check())){
         $profile = Profiles::where('user_id',Auth::user()->id)->first();
         $company = Company::where('company_id',Auth::user()->company_id)->first();
         $division = Division::where('id',Auth::user()->division_id)->first();
         $position = Position::where('id',Auth::user()->position_id)->first();
         return view("profile.profile",['profile' => $profile,'company' => $company,'division' => $division,'position' => $position]);
      }
      return redirect()->route('index');
   }

   public function repass(Request $request){
      if((Auth::check())){
         $validator = Validator::make($request->all(), [
            'password' => [
                  'required',
                  'min:8',
                  function ($attribute, $value, $fail) use ($request) {
                     // ตรวจสอบว่า password ไม่เป็นตัวเลขเดียวกันทั้งหมด
                     if (preg_match('/(\d)\1{7,}/', $value)) {
                        $fail('รหัสผ่านไม่สามารถเป็นตัวเลขเดียวกันซ้ำกันได้');
                     }
                     
                     // ตรวจสอบว่า password มีอักษรพิเศษอย่างน้อย 1 ตัว
                     if (!preg_match('/[^a-zA-Z0-9]/', $value)) {
                        $fail('รหัสผ่านต้องมีอักษรพิเศษอย่างน้อย 1 ตัว');
                     }
                     
                     // ตรวจสอบว่า password มีตัวอักษรทั้งพิมพ์เล็กและพิมพ์ใหญ่อย่างน้อย 1 ตัว
                     if (!preg_match('/[a-z]/', $value) || !preg_match('/[A-Z]/', $value)) {
                        $fail('รหัสผ่านต้องมีตัวอักษรทั้งพิมพ์เล็กและพิมพ์ใหญ่อย่างน้อย 1 ตัว');
                     }
                  },
            ],
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput($request->only('password'));
        }
         $user = Users::where('id',Auth::user()->id)->first();
         // dd($user);
         if($request){
            $password = Hash::make($request->input('password'));

            if($user){
               $user->password = $password;
               $user->save();
            }
         }
         return redirect()->route('profile');
      }
      return redirect()->route('index');
   }
}
