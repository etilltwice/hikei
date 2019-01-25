<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductImage extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->id <= 8) {
            return [
                'product_image_id' => $this->id,
                'product_image_path' => $this->path,
                'product_image_caption' => $this->caption
            ];
        } else {
            return [
                'product_image_id' => $this->id,
                'product_image_path' => $secure_asset($this->path),
                'product_image_caption' => $this->caption
            ];
        }
    }
}
