<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    public function user() {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function statistics() {
        return $this->hasMany(Statistics::class);
    }
}
