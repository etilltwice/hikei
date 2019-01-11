<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Brands extends JsonResource
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
            'account_id' => $this->account_id,
            'brand_name' => $this->brand_name,
            'brand_url' => $this->website_url,
            'brand_caption' => $this->caption,
            'brand_telephone' => $this->phone_number,
            'brand_logo' => $this->logo_path
        ];
    }
}
