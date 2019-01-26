<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProjectFeed extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'project_id' => $this->project_id,
            // 'project_name' => $this->project_name,
            // 'project_caption' => $this->project_caption,
            // 'project_image_id' => $this->project_image_id,
            // 'project_image_caption' => $this->project_image_caption,
            // 'project_image_path' => secure_asset('public/' . $this->project_image_path),
            // 'brand_id' => $this->brand_id,
            // 'brand_logo' => $this->brand_logo
        ];
    }
}
