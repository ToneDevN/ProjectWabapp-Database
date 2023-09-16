<?php

namespace App\Models;

use App\Models\tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobInfo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'nameJob',
    ];

    public function Poser(){
        return $this->belongsTo(Poser::class);
    }

    public function favorites() {
        return $this->hasMany(favorite::class);
    }

    public function Questions(){
        $this->belongsToMany(Question::class);
    }

    public function response(){
        $this->hasMany(responseJobInfo::class);
    }

    public function Tags() {
        $this->belongsToMany(tag::class);
    }
}
