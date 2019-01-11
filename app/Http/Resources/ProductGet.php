<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductGet extends JsonResource
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
            'project_name' => $this[0]->projects->name,
            'project_caption' => $this[0]->projects->caption,
            'product_name' => $this[0]->name,
            'product_price' => $this[0]->price,
            'product_cost' => $this[0]->cost,
            'product_size' => $this[0]->size,
            'product_caption' => $this[0]->caption,
            'product_way' => $this[0]->way,
            'project_images' => ProjectImage::collection($this[0]->projects->projectimages),
            'product_images' => ProductImage::collection($this[0]->productimages)
        ];
    }
}
