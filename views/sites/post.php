<?php

use App\Models\Post;
use App\PhanTrang;

$page = PhanTrang::pageCurrent();
$limit = 2;
$skip = PhanTrang::pageOffset($page, $limit);

$list_post = Post::where([['status', '=', 1], ['type', '=', 'post']])
    ->orderBy('created_at', 'DESC')
    ->skip($skip)
    ->take($limit)
    ->get();
$total = Post::where([['status', '=', 1], ['type', '=', 'post']])->count();
$strLink = PhanTrang::pageLinks($total, $page, $limit, 'index.php?opt=post');
?>

<?php require_once('views/sites/header.php'); ?>
<section class="maincontent my-4 ">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3 class="text-center" style="margin-left: 300px;">Tất cả bài viết</h3>
                <?php foreach ($list_post as $post) : ?>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <i href="index.php?opt=post&slug=<?= $post->slug; ?>" title='<?= $post->title; ?>'>
                                <img class="img-fluid w-100" src="public/images/post/<?= $post->image; ?>" />
                            </i>
                        </div>
                        <div class="col-md-8" >
                            <h3>
                                <i href="index.php?opt=post&slug=<?= $post->slug; ?>" title='<?= $post->title; ?>'>
                                    <?= $post->title; ?>
                                </i>
                            </h3>
                            <p>
                            <?=PhanTrang::word_limit($post->detail, 70);?>
                            
                                <a href="index.php?opt=post&slug=<?= $post->slug; ?>" title='<?= $post->title; ?>'>
                                    
                                ...Xem thêm
                                </a>
                            
                            
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="row py-4">
                    <div class="col-12">
                        <?= $strLink; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once('views/sites/footer.php'); ?>