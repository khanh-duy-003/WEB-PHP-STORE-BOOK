<?php
use App\Models\Post;

$slug=$_REQUEST['cat'];
$page=Post::where([
    ['status','=',1],
    ['type','=','page'],
    ['slug','=',$slug]
])->first();
$list_page_other=Post::where([
    ['status','=',1],
    ['type','=','page'],
    ['slug','!=',$slug]
])
->orderBy('created_at','desc')
->take(10)
->get();
$title=$page['title'];
?>

<?php require_once('views/sites/header.php'); ?>
<section class="">
    <div class="container">
            <h1><?=$page->title;?></h1>
            <p><?=$page->detail;?></p>
    </div>
</section>
<?php require_once('views/sites/footer.php'); ?>
