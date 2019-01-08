<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    // こちらが上位
    public function projects()
    {
        return $this->hasMany('App\Eloquents\Project', 'brand_id', 'id');
    }

    // こちらが下位
    public function brandusers()
    {
        return $this->hasMany('App\Eloquetns\BrandUser', 'brand_id', 'id');
    }
}
