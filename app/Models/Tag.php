<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];


    //BELONGS TO MANY
    public function posts() {
        return $this->belongsToMany(Post::class,'post_tag','tag_id','post_id');
    }

  

    use HasFactory;
}
