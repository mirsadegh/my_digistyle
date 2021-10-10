<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query();
        if ($keyword = \request('search')){
           $users->where('name','LIKE',"%{$keyword}%")->orWhere('email','LIKE',"%{$keyword}%")->orWhere('id', $keyword);
        }
        if (\request('admin')){
            $users->where('is_admin',1)->orWhere('is_stuff',1);
        }
        $users = $users->latest()->paginate(10);
        return view('admin.users.all',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces= \App\Models\Province::all(); 
        return view('admin.users.create',compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterUserRequest $request)
    {

        
        $user = new User();
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->address = $request->input('address');
        $user->nationalCode = $request->input('nationalCode');
        $user->province_id = $request->input('province_id');
        $user->city_id = $request->input('city_id');
        $user->password = $request->input('password');
        $user->agree = 1;

        if($request->user_role == 1){
             $user->is_stuff = 1;
        }elseif ($request->user_role == 2){
            $user->is_admin = 1;
        }

        if($request->has('verify')){
            $user->markEmailAsVerified();
        }
        $user->save();
        
        alert()->success('کاربر با موفقیت ایجاد گردید','ثبت کاربر');
              
        return redirect(route('admin.users.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $provinces= \App\Models\Province::all(); 
        return view('admin.users.edit',compact(['user','provinces']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, User $user)
    {
       
        if($request->has('verify')){
                $user->markEmailAsVerified();
            }
          
        if($user->email != $request->email) {
               $user->email_verified_at = null;
          } 
        $user->update($request->all());

        if($request->user_role == 1){
            $user->is_stuff = true;
        }elseif ($request->user_role == 2){
            $user->is_admin = true;
        }
        $user->save();
        alert()->success('کاربر مورد نظر با موفقیت برروزرسانی گردید.');
        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
         $user->delete();
         alert()->error('کاربر با موفقیت حذف گردید.');
         return redirect(route('admin.users.index'));
    }
}
