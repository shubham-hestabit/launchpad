<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    public function studentData(){

        return $this->hasOne('App\Models\Student');
    }

    public function teacherData(){

        return $this->hasOne('App\Models\Teacher');
    }

    public function assignStudent(){

        return $this->hasOneThrough('App\Models\Assign', 'App\Models\Student', 's_id', 'id');
    }

    public function assignTeacher(){

        return $this->hasManyThrough('App\Models\Assign', 'App\Models\Teacher', 't_id', 'id');
    }
}
