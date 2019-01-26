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
            'brand_official' => $this[0]->brand_name,
            'brand_name' => $this[0]->account_id,
            'brand_url' => $this[0]->website_url,
            'brand_caption' => $this[0]->caption,
            'brand_logo' => $this[0]->logo_path,
            // 'projectimages' => secure_asset('storage/' . $this[1]),
            'projectimages' => 'storage/' . $this[1]->projectimages[0]->path,
        ];
    }
}
