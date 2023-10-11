<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class response_has_question extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $incrementing = true;

    public function Questions(){
        return $this->belongsTo(Question::class, 'idQuestion');
    }
    public function ResponseJob(){
        return $this->belongsTo(responseJobInfo::class, 'idResponse');
    }


     
}
