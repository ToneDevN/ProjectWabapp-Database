<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tag extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'idTag';
    protected $fillable = [
        'tag',
    ];

    public function Users(){
        return $this->belongsToMany(User::class);
    }

    public function Jobinfos(){
        return $this->belongsToMany(JobInfo::class);
    }
}
