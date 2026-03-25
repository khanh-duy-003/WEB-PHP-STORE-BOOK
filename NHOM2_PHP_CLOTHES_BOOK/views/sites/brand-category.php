<?php

use App\Phantrang;
use App\Models\Brand;
use App\Models\Product;

$page = Phantrang::pageCurrent();
$limit = 8;
$skip = PhanTrang::pageOffset($page, $limit);



$slug = $_REQUEST['cat'];

$row_brand = Brand::where([['status', '=', 1], ['slug', '=', $slug]])->first();
$product_list = Product::where([['status', '=', 1], ['brand_id', '=', $row_brand->id]])
   ->orderBy('created_at', 'DESC')
   ->skip($skip)
   ->take($limit)
   ->get();

$total = Product::where([['status', '=', 1], ['brand_id', '=', $row_brand->id]])->count();
$strLink = PhanTrang::pageLinks($total, $page, $limit, 'index.php?opt=brand&cat=' . $slug);
//xu lys phan trang


?>
<?php require_once "views/sites/header.php"; ?>

<!--section mainmenu-->
<section class="maincontent my-3">
   <div class="container">
      <div class="row">
         <div class="col-md-3">
            <?php
            require_once('views/sites/mod_listcategory.php');
            require_once('views/sites/mod_listbrand.php');
            ?>
         </div>

         <div class="col-md-9">
            <h2 class="text-center"> Thương hiệu <?= $row_brand->name; ?>
            </h2>
            <div class="row">
               <?php foreach ($product_list as $product) : ?>
                  <div class="col-md-3 mb-3">
                     <div class="product-item mb-3" style="width: 200px;">
                        <div class="product-item-image">
                           <a href="index.php?opt=product&slug=<?= $product->slug; ?>">
                              <img src="public/images/product/<?= $product->image; ?>" class="img-fluid" alt="" id="img1">
                              <img class="img-fluid" src="public/images/product/<?= $product->image1; ?>" alt="" id="img2">
                           </a>
                        </div>
                        <h2 class="product-item-name text-main text-center fs-5 py-1">
                           <h4 class="text-center" style="color:black;" href="index.php?opt=product&slug=<?= $product->slug; ?>"><?= $product->name; ?></h4>
                        </h2>
                        <h3 class="product-item-price fs-6 p-2 d-flex justify-content-center">
                           <div>
                              <?php
                              if ($product->pricesale < $product->price) {
                                 echo '<div class="text-center ml-2" style="font-weight: normal; color: black;"><span style="color: red;"><del>Giá gốc: ' . number_format($product->price) . 'VND</del></span></div>';
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
                  </div>
               <?php endforeach; ?>
            </div>
            <div><?= $strLink; ?></div>
         </div>
      </div>
   </div>
</section>
<?php require_once('views/sites/footer.php'); ?>