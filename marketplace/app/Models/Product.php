<?php

namespace App\Models;

use App\ProductFeedback;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function comment() {
        return $this->hasMany(Comment::class);
    }

    public function ordered_product() {
        return $this->hasMany(OrderedProduct::class);
    }

    public function productFeedback() {
        return $this->hasMany(ProductFeedback::class);
    }
    public $timestamps = FALSE;
}
