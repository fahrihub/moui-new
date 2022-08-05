<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'section' => $this->section->name,
            'subsection' => $this->subsection->name,
            'name' => $this->name,
            'location' => $this->location,
            'created' => $this->created,
            'report' => $this->report,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
