<?php

use App\Models\Topic;
use App\Models\Post;
use App\PhanTrang;

$slug = $_REQUEST['cat'];
$topic = Topic::where('slug', '=', $slug)
    ->first();
$limit = 2;
$page = PhanTrang::pageCurrent();
$skip = PhanTrang::pageOffset($page, $limit);
$list_post = Post::where([['type', '=', 'post'], ['status', '=', '1'], ['topic_id', '=', $topic->id]])
    ->orderBy('created_at', 'desc')->skip($skip)->take($limit)->get();
$total = Post::where([['type', '=', 'post'], ['status', '=', '1'], ['topic_id', '=', $topic->id]])->count();
$strLink = PhanTrang::pageLinks($total, $page, $limit, 'index.php?opt=post&cat=' . $slug);
?>

<?php require_once('views/sites/header.php'); ?>
<section class="maincontent my-4">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3 class="text-center">Tất cả tin tức</h3>
                <?php foreach ($list_post as $post) : ?>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <a href="index.php?opt=post&slug=<?= $post->slug; ?>" title='<?= $post->title; ?>'>
                                <img class="img-fluid w-100" src="public/images/post/<?= $post->image; ?>" />
                            </a>
                        </div>
                        <div class="col-md-8">
                            <h3>
                                <a href="index.php?opt=post&slug=<?= $post->slug; ?>" title='<?= $post->title; ?>'>
                                    <?= $post->title; ?>
                                </a>
                            </h3>
                            <p>
                                <?=PhanTrang::word_limit($post->detail, 70); ?>
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