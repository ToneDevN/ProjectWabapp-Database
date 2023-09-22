<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class response_has_question extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function response(){
        return $this->belongsTo(responseJobInfo::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
