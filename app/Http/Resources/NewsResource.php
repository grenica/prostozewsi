<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->desc,
            'price' => $this->price,
            'created_at' => (string) $this->created_at,
            'unit'=> $this->unit,
            'farmer' => $this->farmer,
            'category' => $this->category,
            'images' => $this->articleimages,
            'features'=> $this->features,
            
        ];
    }
}
