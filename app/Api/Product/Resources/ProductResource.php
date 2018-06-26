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
                : null;
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'details'=>$this->details,
            'price'=>$this->price,
            'stock'=>$this->stock,
            'discount'=>$this->discount,
            'image'=>$this->image,
            'image_path'=>$this->image_path,
            'reviewsRating'=>$this->reviews ? $rating : null,
            'href'=>[
                'reviews'=>$this->reviews ?  route('reviews.index',$this->id) : null
            ]
        ];
    }
}
