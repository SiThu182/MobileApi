<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Brand;
use App\Type;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
   {
       return [
           'id' => $this->id,
           'name' => $this->name,
           'brand' => new BrandResource(Brand::find($this->brand_id)),
           'type'  => new TypeResource(Type::find($this->type_id)),
           
       ];
   }

}
