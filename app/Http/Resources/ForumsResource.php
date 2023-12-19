<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ForumsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "identify" => $this->id,
            "subject" => $this->subject,
            "body" => $this->body,
            "created_AT" => Carbon::make($this->created_at)->format('Y-m-d')
        ];
    }
}
