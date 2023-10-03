<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class favorite extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function User(){
        return $this->belongsTo(User::class, 'idUser');
    }

    public function JobInfo() {
        return $this->belongsTo(JobInfo::class, 'idJobInfo');
    }
}
