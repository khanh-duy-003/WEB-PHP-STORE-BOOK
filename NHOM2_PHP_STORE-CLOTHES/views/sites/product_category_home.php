<?php

use App\Models\Category;
use App\Models\Product;

$list_catid = [];
array_push($list_catid, $row_cat->id);
$list_category1 = Category::where([['parent_id', '=', $row_cat->id], ['status', '=', 1]])
   ->get();
if (count($list_category1) > 0) {
   foreach ($list_category1 as $row_cat1) {
      array_push($list_catid, $row_cat1->id);
      $list_category2 = Category::where([['parent_id', '=', $row_cat1->id], ['status', '=', 1]])
         ->get();
      if (count($list_category2) > 0) {
         foreach ($list_category2 as $row_cat2) {
            array_push($list_catid, $row_cat2->id);
         }
      }
   }
}
// sam pham
$list_product = Product::where('status', '=', 1)
   ->whereIn('category_id', $list_catid)
   ->orderBy('created_at', 'DESC')
   ->limit(8)
   ->get();
?>
<div class="product-category mt-3">
   <div class="row">
      <div class="col-md-3">
         <div class="category-title bg-main">
            <h1 class="fs-5 py-3 text-center text-uppercase"><?= $row_cat->name; ?></h1>
            <?php if ($row_cat->image != null) : ?>
               <img class="img-fluid d-none d-md-block" src="public/images/category/<?= $row_cat->image; ?>" alt="<?= $row_cat->image; ?>">
            <?php else : ?>
               <img class="img-fluid d-none d-md-block" src="public/images/category/default.png" alt="default.png">
            <?php endif; ?>
         </div>

      </div>
      <div class="col-md-9">
         <div class="row product-list">
            <?php foreach ($list_product as $product) : ?>
               <div class="col-6 col-md-3 mb-4">
                  <?php require('views/sites/product_item.php'); ?>
               </div>
            <?php endforeach; ?>
         </div>
         <style>
            .wraplist-button {
               margin-left: 300px;
               display: inline-block;
               position: relative;
               padding: 10px 20px;
               border: none;
               color: white;
               text-decoration: none;
               cursor: pointer;
               overflow: hidden;
               background: linear-gradient(to right, green 50%, orange 100%);
               background-size: 200% 100%;
               transition: background-position 1s;
               border-radius: 20px;
            }

            .wraplist-button:hover {
               background-position: -100% 0;
            }
         </style>

         
            <a class="wraplist-button text-center visible-mobile" href="index.php?opt=product&cat=<?= $row_cat->slug;?>" >
               Xem thêm Tất cả Sản phẩm
            </a>
      </div>
      
   </div>

</div>