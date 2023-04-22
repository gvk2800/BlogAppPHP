<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class blog extends Model
{
    //
    use SoftDeletes;
    protected $table="blog";
    // // one to one relationship
    // public function category()
    // {
    //     return $this->hasOne('App\categories','id','category_id');
    // }
    public function category()
    {
        return $this->belongsTo('App\categories','category_id','id');
    }
    public function tags()
    {
        return $this->belongsToMany('App\tag');
    }
}
