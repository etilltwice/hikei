<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandPage extends JsonResource
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
            'brand_official' => $this->brand_name,
            'brand_name' => $this->account_id,
            'brand_url' => $this->website_url,
            'brand_caption' => $this->caption,
            'brand_logo' => $this->logo_path,
            'projectimages' => \DB::table('project_images')
                ->join('projects', 'project_images.project_id', '=', 'projects.id')
                ->join('brands', 'brands.id', '=', 'projects.brand_id')
                ->where('brands.id', $this->id)
                ->orderby('project_images.updated_at', 'desc')
                ->get(),
        ];
    }
}
