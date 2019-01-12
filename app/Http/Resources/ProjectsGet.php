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
            'project_name' => ProjectImage::collection($this->projectImages)
        ];
    }
}
