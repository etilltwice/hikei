<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    //こちらが上位
    public function projectimages()
    {
        return $this->hasMany('App\Eloquents\ProjectImage', 'project_id', 'id');
    }

    public function products()
    {
        return $this->has('App\Eloquents\Product', 'id', 'product_id');
    }

    //こちらが下位
    public function brands()
    {
        return $this->belongsTo('App\Eloquents\Brand', 'brand_id', 'id');
    }
}
