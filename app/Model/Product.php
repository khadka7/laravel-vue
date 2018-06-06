<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable=['name','details','price','stock','discount'];

    public function reviews(){
      return $this->hasMany(Review::class);
    }


}
