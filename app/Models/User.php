<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Devinweb\LaravelHyperpay\Traits\ManageUserTransactions;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use ManageUserTransactions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [
         'id','created_at','updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
  
    public function articles()
    {
        return $this->hasMany('\App\Models\Article');
    }
    public function payments()
    {
        return $this->hasMany('\App\Models\Payment');
    }
    public function orders()
    {
        return $this->hasMany('\App\Models\Order');
    }
    public function getUserAvatar()
    {
        if($this->profile_photo_path==null)
            return '/images/profile.png';
        else
            return 'https://chartidea-production-public.s3.eu-west-3.amazonaws.com/avatars/'.$this->profile_photo_path;

    }
}
