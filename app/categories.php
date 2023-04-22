<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categories extends Model
{
    //
    use SoftDeletes;
    protected $table='categories';
    // one to many
    public function blogs()
    {
        return $this->hasMany('App\blog','category_id','id');
    }
}
