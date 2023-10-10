<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class user_has_tag extends Model
{
    use HasFactory;
    use SoftDeletes; 
    protected $table = 'user_has_tags';
//  protected $primaryKey = ['idUser','idTag']; 
protected $fillable = [
    'idUser','idTag'
];

    public function tag(){
        return $this->belongsTo(tag::class,'idTag');
    }
    public function user(){
        return $this->belongsTo(User::class,'idUser');
    }
}
