<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'name', 'lastname', 'patronymic', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function chosen() {
        return $this->hasMany(Chosen::class);
    }

    public function address() {
        return $this->hasOne(Address::class);
    }

    public function permission() {
        return $this->hasOne(Permission::class);
    }

    public function orderHistory() {
        return $this->hasMany(OrderHistory::class);
    }

    public function seller() {
        return $this->belongsTo(Seller::class);
    }

    public function feedback() {
        return $this->hasMany(Feedback::class);
    }
}
