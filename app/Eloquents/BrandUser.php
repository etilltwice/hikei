<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

class BrandUser extends Model
{
    protected $table = 'brand_users';

    // こちらが下位
    public function brands()
    {
        $this->BelongsToMany('App\Eloquents\Brand', 'brand_id', 'id');
    }
}
