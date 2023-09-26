<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function Jobinfos(){
        return $this->belongsToMany(JobInfo::class);
    }

    public function responses(){
        return $this->hasMany(responseJobInfo::class);
    }

    public function response_has_question(){
        return $this->hasMany(response_has_question::class);
    }
}
