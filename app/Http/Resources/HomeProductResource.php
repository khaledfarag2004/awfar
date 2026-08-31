<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'       => $this->id,
            'name'     => $this->name,
            'price_after_discount'    => $this->price_after_discount,
            'image'    => $this->image,
            'quantity' => $this->quantity,
            'category' => $this->category ? $this->category->name : null,
        ];
    }
}
