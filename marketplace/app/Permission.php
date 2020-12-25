<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function user() {
        return $this->belongsTo('user', 'user_id', 'id');
    }
}
