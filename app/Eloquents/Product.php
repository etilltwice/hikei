<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    // こちらが上位
    public function productimages()
    {
        return $this->hasMany('App\Eloquents\ProductImage', 'product_id', 'id');
    }

    // こちらが下位
    public function projects()
    {
        return $this->belongsTo('App\Eloquents\Project', 'product_id', 'id');
    }
}
