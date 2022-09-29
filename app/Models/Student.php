<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 's_id';

    public function usersData(){
        return $this->belongsTo('App\Models\Main');
    }
}

