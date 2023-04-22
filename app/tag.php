<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    //
    protected $table='tag';
    
    public function blogs()
    {
        return $this->belongsToMany('App\blog','blog_tag');
    }
}
