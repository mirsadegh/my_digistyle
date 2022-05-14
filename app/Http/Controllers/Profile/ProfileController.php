<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{


      public function index(){
        $user = auth()->user();
        return view('Frontend.profile.index',compact('user'));
      }

      public function edit(User $user){
          $provinces = Province::all();
          return view('Frontend.profile.edit',compact(['user','provinces']));
      }

      public function getAllCities($provinceId){
             $cities = City::where('province_id',$provinceId)->get();
             $response = [
               'cities' => $cities,
             ];
             return response()->json($response);

      }

      public function update(Request $request,User $user)
      {

           $validataed =  $request->validate([
               'name' => 'required',
               'lastname' => 'required',
               'email' => ['required','email',Rule::unique('users','email')->ignore($user->id)],
               'phone' => ['required','regex:/^(?:98|\+98|0098|0)?9[0-9]{9}$/', Rule::unique('users','phone')->ignore($user->id)],
               'gender'=> [Rule::in(['male','female'])],
               'address' => 'required',
               'nationalCode' => ['required','numeric',Rule::unique('users','nationalCode')->ignore($user->id)],
               "province_id" => "nullable",
               "city_id"     => "nullable",
             ]);
             if($validataed['email'] != $user->email){
                  $user->email_verified_at = null;
             }
             $user->update($validataed);
             alert()->success('اطلاعات حساب کاربری با موفقیت بروزرسانی گردید.','بسیار خوب');
             return redirect('/profile');
      }

      public function changePassword()
      {
        return view('Frontend.profile.changePassword');
      }

      public function updatePassword(Request $request)
      {

         $validataed = $request->validate([
            "password"     => ['required', 'string', 'min:8','confirmed'] ,
          ]);
          $userId = auth()->id();
          $user = User::find($userId);
         
          $user->update($validataed);
          alert()->success('رمز عبور باموفقیت برروزرسانی گردید');
          return redirect('/profile');

      }


}
