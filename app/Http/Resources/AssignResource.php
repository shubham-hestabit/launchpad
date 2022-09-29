<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignResource extends JsonResource
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
            // 'Admin ID' => $this->assignTeacher->
            'Student ID' => $this->teacherData->s_id,
            'Teacher ID' => $this->teacherData->s_id,
        ];
    }
}
