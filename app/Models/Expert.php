<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','experience','info','image_path','available_time'
    ];

    public $timestamps=false;

    public  function user(){
        return $this->belongsTo(User::class);
    }
}
