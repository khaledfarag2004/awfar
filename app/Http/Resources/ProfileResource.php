<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'name' => $this->name,
          'phone' => $this->phone,
          'email' => $this->email,
          'city' => optional($this->city)->name,
          'type' => $this->type,
          'is_active'   => $this->is_active ? 'Active' : 'Disactive',
          'is_blocked'  => $this->is_blocked ? 'Blocked' : 'Not Blocked',        ];
    }
}
