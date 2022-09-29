<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'Id' => $this->id,
            'Name' => $this->name,
            'Email' => $this->email,
            'Address' => $this->address,
            'Current School' => $this->current_school,
            'Previous School' => $this->previous_school,
            'Approval Status' => $this->approval_status,
            'Role ID' => $this->r_id
        ];
    }
}


// Column	Type	Comment
// id	bigint unsigned Auto Increment	
// name	varchar(100)	
// email	varchar(150)	
// address	text	
// title	varchar(255)	
// profile_picture	varchar(255) NULL	
// current_school	varchar(255)	
// previous_school	varchar(255)	
// r_id	bigint unsigned [3]	
// approval_status	i