<?php

namespace App\Models;

use App\Models\favorite;
use App\Models\Poser;
use App\Models\Question;
use App\Models\responseJobInfo;
use App\Models\tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobInfo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'idJobInfo';

    protected $fillable = [
        'nameJob',
    ];



    public function Poser(){
        return $this->belongsTo(Poser::class, 'idUser');
    }

    public function favorites() {
        return $this->hasMany(favorite::class, 'idJobInfo');
    }

    public function Questions(){
        return $this->hasMany(Question::class, 'idJobinfo', 'idQuestion');
    }

    public function response(){
        $this->hasMany(responseJobInfo::class);
    }

    public function Tags() {
        return $this->belongsToMany(Tag::class, 'jobinfo_has_tags', 'idJobinfo', 'idTag');
    }
}
