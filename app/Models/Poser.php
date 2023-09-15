<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poser extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function Users() {
        return $this->belongsTo(User::class);
    }

    public function Jobinfos(){
        return $this->hasMany(JobInfo::class);
    }

}
