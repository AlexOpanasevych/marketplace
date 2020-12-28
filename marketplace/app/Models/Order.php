<?php

namespace App\Models;

use App\OrderHistory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function status() {
        return $this->belongsTo(Status::class);
    }
    public function ordered_product() {
        return $this->hasMany(OrderedProduct::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
