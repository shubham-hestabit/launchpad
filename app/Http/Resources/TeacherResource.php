<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
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
            'Teacher ID' => $this->teacherData->s_id,
            'Name' => $this->name,
            'Email' => $this->email,
            'Address' => $this->address,
            'Experience' => $this->teacherData->father_name, 
            'Expertise Subjects' => $this->teacherData->mother_name,
        ];
    }
}
