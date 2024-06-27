<?php

namespace App\Http\Controllers;

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
         $request->validate([
            'password' => 'required|string|confirmed',
        ]);
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
