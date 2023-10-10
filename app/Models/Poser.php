<?php

namespace App\Models;

use App\Models\JobInfo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'idUser';

    public function Users() {
        return $this->belongsTo(User::class,'idUser');
    }

    public function Jobinfos(){
        return $this->hasMany(JobInfo::class, 'idUser');
    }

    protected $table = 'posers';

    protected $fillable = [
        'idUser',
        'userOfficeName',
        'userOfficeAddress',
    ];

}
