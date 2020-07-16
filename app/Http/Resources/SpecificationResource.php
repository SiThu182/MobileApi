<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Category;
class SpecificationResource extends JsonResource
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
              'category'  => new CategoryResource(Category::find($this->category_id)),
              'cpu' => $this->cpu,
              'memory' => $this->memory,
              'main_camera' => $this->main_camera,
              'selfie_camera' => $this->selfie_camera,
              'battery' => $this->battery,
              'features' => $this->features,
              'display'   => $this->display,
              'capacity' => $this->capacity,
              'price'   => $this->price,
              'image'   => $this->image, 
              'os'      => $this->os,
              'date'    => $this->date,
              'review'  => $this->review,
              'youtube' => $this->youtube,
              'cpu_rank'=> $this->cpu_rank,
              'gpu_rank'=> $this->gpu_rank,
              'memory_rank' => $this->memory_rank,
              'ux_rank' => $this->ux_rank,
              'total'   => $this->total
        ];
    }
}
