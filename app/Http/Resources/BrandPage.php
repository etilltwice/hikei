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
            'brand_official' => $this->account_id,
            'brand_name' => $this->brand_name,
            'brand_url' => $this->website_url,
            'brand_caption' => $this->caption,
            'brand_logo' => $this->logo_path,
            'projects' => Projects::collection($this->projects)
        ];
    }
}
