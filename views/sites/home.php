<?php

use App\Models\Category;
use App\Models\Product;

$list_category = Category::where([['parent_id', '=', 0], ['status', '=', 1]])
   ->orderBy('sort_order', 'ASC')
   ->get();
?>

<?php require_once "views/sites/header.php"; ?>
<?php require_once "views/sites/mod_slider.php"; ?>
<?php
if (isset($_POST['keyword'])) {
   $keyword = $_POST['keyword'];
   if (!empty($keyword)) {
      echo "<h3 class='text-center'>Kết quả tìm kiếm cho từ khóa <span style='color: red;'>\"$keyword\"</span>:</h3>";
      // Truy vấn cơ sở dữ liệu và hiển thị kết quả tìm kiếm
      $results = Product::where('name', 'LIKE', '%' . $keyword . '%')
         ->orWhere('price', 'LIKE', '%' . $keyword . '%')
         ->orWhere('detail', 'LIKE', '%' . $keyword . '%')
         ->take(8)
         ->get();
      if ($results->count() > 0) {
         $count = 0;
         echo '<div class="row product-list">';
         foreach ($results as $product) {
?>
            <div class="product-item border" style="width: 230px; margin-left:50px; margin-bottom:20px ;" >
               <div class="product-item-image">
                  <a href="index.php?opt=product&slug=<?= $product->slug; ?>">
                     <img src="public/images/product/<?= $product->image; ?>" class="img-fluid" alt="" id="img1">
                     <img class="img-fluid" src="public/images/product/<?= $product->image; ?>" alt="" id="img2">
                  </a>
               </div>
               <h2 class="product-item-name text-main text-center fs-5 py-1">
                  <div class="text-center" style="color:black;" href="index.php?opt=product&slug=<?= $product->slug; ?>"><?= $product->name; ?></div>
               </h2>
               <h3 class="product-item-price fs-6 p-2 d-flex justify-content-center" >
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
<?php

            $count++;
            if ($count % 8 === 0) {
               echo '</div><div class="row product-list">';
            }
         }
         echo '</div>';
      } else {
         echo " <div class='text-center'>Không tìm thấy kết quả cho từ khóa \"$keyword\".</div>";
      }
   } else {
      require_once('views/sites/search.php');
   }
} else {
   require_once('views/sites/search.php');
}
?>

<section class="hdl-maincontent">
   <div class="container">

      <?php foreach ($list_category as  $row_cat) : ?>
         <?php require "views/sites/product_category_home.php"; ?>

      <?php endforeach; ?>
   </div>
</section>

<?php require_once "views/sites/mod_lastpost.php"; ?>

<?php require_once "footer.php"; ?>