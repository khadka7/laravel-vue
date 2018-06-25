<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    protected  $fillable = ['customer','star','review','product_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
