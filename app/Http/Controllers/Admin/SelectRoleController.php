<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SelectRoleController extends Controller
{
    public function create(User $user)
    {
          $roles = Role::all();
         return view('admin.users.roles',compact('user','roles'));
    }

    public function store(User $user,Request $request)
    {

            $user->role_id  = $request->role;
            $user->save();
            alert()->success('مقام مورد نظر به کاربر اضافه شد.');
            return redirect()->route('admin.users.index');
    }
}
