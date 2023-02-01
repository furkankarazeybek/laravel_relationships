<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "country"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //HAS ONE 
    public function address() 
    {
        return $this->hasOne(Address::class,'uid','id'); //select * from address where uid= ?  // (foreign model,foregin key,local key)

    }



    //HAS MANY

    public function addresses()
    {
        return $this->hasMany(Address::class,"uid","id"); //foreign model,foreign key,localkey
    }

    public function posts() 
    {
        return $this->hasMany(Post::class,"user_id",'id');
    }
}
