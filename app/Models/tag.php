<?php

namespace App\Models;

use App\Models\user_has_tag;
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

    public function UserTags(){
        return $this->hasMany(user_has_tag::class, 'idTag');
    }
}
