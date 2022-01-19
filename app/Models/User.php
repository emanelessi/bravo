<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

    public function address()
    {
        return $this->hasOne(Address::class, 'user_id', 'id');

    }
    public function favorite()
    {
        return $this->hasOne(Favorite::class, 'user_id', 'id');

    }
    public function rate()
    {
        return $this->hasOne(Rate::class, 'user_id', 'id');

    }
    public function cart()
    {
        return $this->hasOne(Cart::class, 'user_id', 'id');

    }

}
