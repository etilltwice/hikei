<?php

namespace App\Http\Resources;

use App\Eloquents\ProjectImage;
use Illuminate\Http\Resources\Json\JsonResource;

class Projects extends JsonResource
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
            'project_id' => $this->id,
            'project_name' => $this->name,
            'project_image_path' => ProjectImage::where('project_id', $this->id)->first(),
        ];
    }
}
