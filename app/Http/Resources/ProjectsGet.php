<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectsGet extends JsonResource
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
            'project_name' => $this->name,
            'project_caption' => $this->caption,
            'brand_id' => $this->brands->id,
            'brand_logo' => $this->brands->logo_path,
            'product_id' => $this->products->id,
            'product_name' => $this->products->name,
            'product_price' => $this->products->price,
            'product_size' => $this->products->size,
            'product_caption' => $this->products->caption,
            'product_way' => $this->products->way,
            'product_image_path' => $this->products->productimages[0]->path,
            'product_image_caption' => $this->products->productimages[0]->caption,
            'project_images' => ProjectImage::collection($this->projectimages)
        ];
    }
}
