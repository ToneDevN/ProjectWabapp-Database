<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class responseJobInfo extends Model
{
    use HasFactory;
    use SoftDeletes;
protected $fillable = ['idUser'];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Jobinfo(){
        return $this->belongsTo(JobInfo::class);
    }

    public function Question(){
        return $this->belongsTo(Question::class);
    }

    public function response_has_question(){
        return $this->hasMany(response_has_question::class);
    }
}
