<?php

namespace App;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ProductFeedback extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
