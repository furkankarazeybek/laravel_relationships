<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
         <div> 
           <?php
           /*  
           //HAS ONE  localhost:8000/user

             foreach($users as $user) {?>
               <h2>{{ $user->name }}</h2>
               <p>{{ $user->address->country }} </p>
             <?php  }  
            */

            /* //BELONGS TO localhost:8000/user
            foreach($addresses as $address) {?>
               <h2>{{ $address->country }}</h2>
               <p>{{ $address->user->name  }} </p>


             <?php  }   */ 


            /* 
             //HAS MANY(adres) localhost:8000/user

             foreach($users as $user) {?>
               <h2>{{ $user->name }}</h2>
               <?php 
               foreach($user->addresses as $address) {?>
                <p>{{ $address->country }} </p>

              <?php
               } 
               
             ?> */

              //HAS MANY (post) localhost:8000/user

               foreach($users as $user) {?>
                 <h2>{{ $user->name }}</h2>
                 <?php 
                 foreach($user->posts as $post) {?>
                  <p>{{ $post->title }} </p>
               
                <?php
                 } 
                 
               ?>
               


             <?php  } 


             


            ?>  
          </div>   
        </div>   
    </div>   
</div>