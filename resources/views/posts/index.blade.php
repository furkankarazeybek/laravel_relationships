<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
         <div> 
           <?php
           //HAS MANY

             foreach($posts as $post) {
                //optional: bazen boş gelebilecek değerler için
                ?>
               <h1>{{ $post->title }}</h1>  
               <p>{{ optional($post->user)->name }}</p>

                        <ul>
                         <?php

                        //BELONGS TO MANY
                         foreach($post->tags as $tag) {
                           ?>
                            <li>{{ $tag->name }} ({{ $tag->pivot->created_at }})</li>
                          <?php  }  ?>
                        </ul> 
               <?php  } 
                ?>  
            
          </div>   
        </div>   
    </div>   
</div>