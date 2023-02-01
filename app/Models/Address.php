<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $fillable = ['uid', 'country'];


    //BELONGS TO 
    public function user() 
    {
        return $this->belongsTo(User::class,'uid','id'); //(foreign model,local key, foreign key)
    }

    use HasFactory;
}
