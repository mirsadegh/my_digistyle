<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'lastname',
        'phone',
        'gender',
        'address',
        'nationalCode',
        'province_id',
        'city_id',
        'agree',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }


    public function isSuperUser()
    {
            if($this->role == null)return false;
            if($this->role->name == "super-admin")return true;
    }

    public function isAuthAdminPanel()
    {
             if($this->role == null)return false;
             if($this->role->name ) return true;
    }

    public function isNormalUser()
    {
        if($this->role == null)return true;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function province()
    {
       return $this->belongsTo(Province::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Product::class,'favorites','user_id','product_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasRole($roles)
    {
           foreach($roles as $role){
               $res = ($this->role->name == $role->name);
           }
          return $res;
    }

    public function hasPermission($permission)
    {

          return $this->hasRole($permission->roles);
    }
}
