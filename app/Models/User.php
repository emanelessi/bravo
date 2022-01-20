<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'phone',
        'phone_verified_at',
        'email',
        'password',
        'photo',
        'is_active',
        'forget_code',
        'is_verify',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'phone_verified_at' => 'datetime',
    ];

    public function findForPassport($username)
    {
        return $this->where('phone', $username)->first();
    }
    public function address()
    {
        return $this->hasMany(Address::class, 'user_id', 'id');
    }
    public function favorite()
    {
        return $this->hasMany(Favorite::class, 'user_id', 'id');
    }
    public function rate()
    {
        return $this->hasMany(Rate::class, 'user_id', 'id');

    }
    public function cart()
    {
        return $this->hasMany(Cart::class, 'user_id', 'id');

    }

}
