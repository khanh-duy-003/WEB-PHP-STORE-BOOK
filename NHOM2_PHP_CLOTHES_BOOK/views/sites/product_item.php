<div class="product-item border" style="width: 200px;"> 
    <div class="product-item-image">
        <a href="index.php?opt=product&slug=<?= $product->slug; ?>">
            <img src="public/images/product/<?= $product->image; ?>" class="img-fluid" alt="" id="img1">
            <img class="img-fluid" src="public/images/product/<?= $product->image1; ?>" alt="" id="img2">
        </a>
    </div>
    <h2 class="product-item-name text-main text-center fs-5 py-1" >
        <div class="text-center" style="color:black;" href="index.php?opt=product&slug=<?= $product->slug; ?>"><?= $product->name; ?></div>
    </h2>
    <h3 class="product-item-price fs-6 p-2 d-flex justify-content-center">
        <div>
            <?php
            if ($product->pricesale < $product->price) {
                echo '<div class="text-center ml-2" style="font-weight: normal; color: black;"><span style="color: red;"> <del>Giá gốc: ' . number_format($product->price) . 'VND</del></span></div>';
            } else {
                echo '<div class="text-main ml-2" style="font-weight: normal; color: black;">Giá gốc: ' . number_format($product->price) . 'VND</div>';
            }
            ?>

            <?php if ($product->pricesale < $product->price) : ?>
                <div class="text-main ml-2" style="font-weight: normal; color: black;">
                    <span>Khuyến mãi: <?= number_format($product->pricesale) ?>VND</span>
                </div>
            <?php endif; ?>

    </h3>
    <div class="text-center" style="padding: 10px;">
        <a href="index.php?opt=product&slug=<?= $product->slug; ?>
        " type="button" class="btn-buy" title="Mua sản phẩm" style="display: block; width: 100%;
         padding: 10px; text-decoration: none; color: black; border: 1px solid red; border-radius: 5px; text-align: center; transition: border-color 0.3s;
         " onmouseover="this.style.borderColor = 'yellow'; 
         this.style.backgroundColor = '#FF9900';
         " onmouseout="this.style.borderColor = 'red';
         this.style.backgroundColor = '';">
            Xem sản phẩm
        </a>
    </div>
</div>