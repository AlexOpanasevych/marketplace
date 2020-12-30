<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function statistics() {
        return $this->hasMany(Statistics::class);
    }
}
