<?php

use App\Models\Banner;

$list_banner = Banner::where([['position', '=', 'slideshow'], ['status', '=', 1]])
    ->orderBy('created_at', 'DESC')
    ->get();
?>
<section class="hdl-slideshow">
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <?php $index = 1; ?>
            <?php foreach ($list_banner as $slider) : ?>
                <div class="carousel-item <?php echo ($index == 1) ? 'active' : ''; ?>">
                    <img src="public/images/banner/<?= $slider->image; ?>" class="d-block w-100 slideshow-image" alt="<?= $slider->image; ?>">
                </div>
                <?php $index++; ?>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>


