<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
         <div> 
           <?php
           //HAS MANY

             foreach($tags as $tag) {
                ?>
               <h1>{{ $tag->name }}</h1>  
               <p>{{ $tag->user}}</p>

                        <ul>
                         <?php

                        //BELONGS TO MANY
                         foreach($tag->posts as $post) {
                           ?>
                            <li>{{ $post->title }}</li>
                          <?php  }  ?>
                        </ul> 
               <?php  } 
                ?>  
            
          </div>   
        </div>   
    </div>   
</div>