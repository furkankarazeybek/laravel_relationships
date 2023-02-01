<?php

use App\Models\Address;
use App\Models\User;
use App\Models\Post;
use App\Models\Tag;
use Faker\Factory;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//(one to one)
//HAS ONE KULLANIMI : User oluşturarak aynı zamanda adres oluşturmayı sağlar
/* Route::get('/user', function () {

    $faker = Faker\Factory::create();
    $user = User::factory()->create();


    //hasOne relation sonrası kayıt
     $user->address()->create([
        'country' => $faker->country
    ]);

/*
    //hasOne relation öncesi kayıt
         Address::create([
        'uid' => $user->id,
        'country' => "Turkiye",
    ]); 
 */
/*
    $users  = User::all();

    return view('users.index', compact('users'));
   
  
}); */
//-------------------------------------------//
//(one to one)
//BELONGS TO KULLANIMI : adres oluşturarak aynı zamanda user oluşturmayı sağlar

/*     Route::get('/user', function () {

        $faker = Faker\Factory::create();

        $user = User::factory()->create();
        $address = new Address([
            'country' => $faker->country
        ]);

        $address->user()->associate(($user));

        $address->save();

        $addresses = Address::with('user')->get();
        return view('users.index', compact('addresses'));
    
    
    });  */


/* 
//HAS MANY: bir user'a birden fazla adress oluşturmak(one to many)(adres)

Route::get('/user', function () {

  

    $users = User::with('addresses')->get();

    $users[0]->addresses()->create([
        'country' => 'Germany'
    ]);
    return view('users.index', compact('users'));


}); 
*/


//------------------------------------------//

/* 

//BELONGS TO (post model)
Route::get('/posts', function () {

   /*     Post::create([
    //'user_id' => 1,
    'title' => 'post title 1'
    ]); */
    /*

    $posts = Post::get();

    return view('posts.index', compact('posts'));


}); */


//HAS MANY (post model)
Route::get('/user', function () {



   $users = User::has('posts','>=',1)->with('posts')->get();  //has sadece postu olan kullanıcıları getirmeyi sağlar

  /*   $users = User::whereHas('posts', function ($query) {
        $query->where('title', 'like', '%title%');  // title kelimesi geçen
   })->with('posts')->get(); 
  */

   // $users = User::doesntHave('posts')->with('posts')->get(); //postu olmayan kullanıcları getirir


    
    /* $users[1]->posts()->create([
        'title' => "post  4"
    ]); */

   
    return view('users.index', compact('users'));


}); 




//BelongsToMany -- ManyToMany


Route::get('/posts', function () {

   

    $post = Post::first();

   

    //$post->tags()->attach([1,2,3,4]); //ekler
 
    //$post->tags()->detach([1,4]);  //kaldırır

   // $post->tags()->attach([1,4]);

    $post->tags()->detach([
        1
        
     ]);   







    $posts = Post::with(['user','tags'])->get();
    return view('posts.index', compact('posts'));
 
 
 });

Route::get('/tags', function () {

    $tags = Tag::with('posts')->get();
    return view('tags.index', compact('tags'));
 });
 

