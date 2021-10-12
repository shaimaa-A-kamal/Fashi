<?php

namespace App\Models;

use App\Notifications\adminVerificationEmail;
use App\Models\address\address;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\CanResetPassword;

class Admin extends Authenticatable implements MustVerifyEmail,CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    public function setPasswordAttribute($value)
    {
         $this->attributes['password']=Hash::make($value);
     }

     public function getGenderAttribute($value){
         $gender= $value =='m' ? 'Male' :'Female';
         return $gender;
     }

     public function addresses(){
        return $this->hasMany(Address::class);
     }

     public function sendEmailVerificationNotification()
     {
        $this->notify(new adminVerificationEmail);
     }



    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'gender',
        'image',
        'phone',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];



    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
