<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductByCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->desc,
            'price' => $this->price,
            // 'created_at' => (string) $this->created_at,
            // 'unit'=> $this->unit,
            'unit'=> new UnitResource($this->unit),
            // 'farmer' => $this->farmer,
            'farmer' => new  FarmerResource($this->farmer),
            'category' => $this->category,
            'category' => new CategoryResource($this->category),
             'images' => $this->articleimages,
            // 'images' => new ImagesResource($this->articleimages),
            'features'=> $this->features,
            // 'features'=> new FeaturesResource($this->features),
            
        ];
    }
}
