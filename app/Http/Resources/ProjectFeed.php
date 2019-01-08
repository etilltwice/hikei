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
            'project_image_id' => $this->project_image_id,
                // 'project_image_caption'
                // 'project_image_path'
                // 'project_id'
                // 'project_name'
                // 'project_caption'
                // 'brand_id'
                // 'brand_logo'
        ];
    }
}
