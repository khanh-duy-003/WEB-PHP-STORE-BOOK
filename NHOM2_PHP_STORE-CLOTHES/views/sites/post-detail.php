<?php
use App\Models\Post;

$slug=$_REQUEST['slug'];
$row_post=Post::where( [ ['status','=',1],
['type','=','post'],
['slug','=',$slug]])->first();
$list_other=Post::where(  [['status','=',1],
['type','=','post'],
['slug','!=',$slug]])
->orderBy('created_at','desc')
->take(10)
->get();
$title=$row_post['title'];
?>

<?php require_once "views/sites/header.php"; ?>
   <section class="bg-light">
      <div class="container">
         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb py-2 my-0">
               <li class="breadcrumb-item">
                  <a class="text-main" href="index.php">Trang chủ</a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">
                  Chi tiết bài viết
               </li>
            </ol>
         </nav>
      </div>
   </section>
   <section class="hdl-maincontent py-2">
      <div class="container">
            <h1><?=$row_post->title;?></h1>
            <p><?=$row_post->detail;?></p>
            
    </div>
   </section>
   <?php require_once "views/sites/footer.php"; ?>
