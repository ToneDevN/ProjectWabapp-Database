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
protected $primaryKey = 'idJobInfo';
    public function User(){
        return $this->belongsTo(User::class,'idUser');
    }

    public function Jobinfo(){
        return $this->belongsTo(JobInfo::class,'idJobInfo');
    }


    public function response_has_question(){
        return $this->hasMany(response_has_question::class, 'idResponse');
    }
}
