<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $rating = $this->reviews->count() > 0
                ? round($this->reviews->sum('star')/$this->reviews->count(),3)
                : 'N/A';
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'details'=>$this->details,
            'price'=>$this->price,
            'stock'=>$this->stock,
            'discount'=>$this->discount,
            'reviewsRating'=>$this->reviews ? $rating : "",
            'href'=>[
                'reviews'=>$this->reviews ?  route('reviews.index',$this->id) : ""
            ]
        ];
    }
}
