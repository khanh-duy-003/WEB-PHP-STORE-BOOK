<?php

use App\Models\Post;
use App\Phantrang;

$limit = 2;
$list_post = Post::where([['status', '=', 1], ['type', '=', 'post']])
   ->orderBy('created_at', 'DESC')
   ->take($limit)
   ->get();
?>


<section class="hdl-lastpost bg-main mt-3 py-4">
   <div class="container">
      <div class="row">
         <div class="col-md-9">
            <h3>BÀI VIẾT MỚI</h3>
            <div class="row">
               <div class="col-md-6">
                  <a href="#">
                     <img class="img-fluid" src="public/images/post/post-4.webp" />
                  </a>

               </div>
               <div class="col-md-6">
                  <?php foreach ($list_post as $post) : ?>
                     <div class="row mb-3">
                        <div class="col-md-4">
                           <a href="index.php?opt=post&slug=<?= $post->slug; ?>" title='<?= $post->title; ?>'>
                              <img class="img-fluid" src="public/images/post/<?= $post->image; ?>" />
                           </a>
                        </div>
                        <div class="col-md-8">
                           <h3 class="post-title fs-5">
                              <a href="index.php?opt=post&slug=<?= $post->slug;  ?>" title='<?= $post->title; ?>'>
                                 <?= $post->title; ?>
                              </a>
                           </h3>
                           <p>
                              <?= Phantrang::word_limit($post->detail, 10); ?>...xem thêm
                           </p>
                        </div>
                     </div>
                  <?php endforeach; ?>
               </div>

            </div>
         </div>
      </div>

   </div>
   </div>
</section>