<?php

use App\Models\Product;
use App\Models\Category;

$slug = $_REQUEST['slug'];
$product = Product::where([['status', '=', 1], ['slug', '=', $slug]])
   ->first();
$title = $product->name;
$argc_category = [
   ['status', '=', 1],
   ['parent_id', '=', '0']
];
$list_category = Category::where($argc_category)
   ->orderBy('sort_order', 'ASC')
   ->get();

$list_category_id = array();
array_push($list_category_id, $product->category_id);

foreach ($list_category as $row_cat) {
   $argc_category = [
      ['status', '=', 1],
      ['parent_id', '=', $row_cat->id]
   ];
   $list_category1 = Category::where($argc_category)
      ->get();

   if (count($list_category1) > 0) {
      foreach ($list_category1 as $row_cat1) {
         array_push($list_category_id, $row_cat1->id);
         $argc_category = [
            ['status', '=', 1],
            ['parent_id', '=', $row_cat1->id]
         ];
         $list_category2 = Category::where($argc_category)
            ->get();

         if (count($list_category2) > 0) {
            foreach ($list_category2 as $row_cat2) {
               array_push($list_category_id, $row_cat2->id);
               $argc_category = [
                  ['status', '=', 1],
                  ['parent_id', '=', $row_cat2->id]
               ];
               $list_category3 = Category::where($argc_category)
                  ->get();

               if (count($list_category3) > 0) {
                  foreach ($list_category3 as $row_cat3) {
                     array_push($list_category_id, $row_cat3->id);
                  }
               }
            }
         }
      }
   }
}

$product_list = Product::where([
   ['status', '=', 1],
   ['id', '!=', $product->id]
])
   ->whereIn('category_id', $list_category_id)
   ->orderBy('created_at', 'asc')
   ->take(4)
   ->get();
?>
<?php require_once "header.php"; ?>
<section class="hdl-maincontent py-2">
   <div class="container">
      <div class="row">

         <div class="col-md-6">
            <img class="img-fluid w-100" src="public/images/product/<?= $product->image; ?>" />
         </div>
         <div class="col-md-6">
            <h1 class="fs-2"><?= $product->name ?></h1>
            <b class="fs-2"><?= $product->metadesc; ?></b>
            <h2>Giá bán: <?= $product->price; ?></h2>
            <input type="number" id="qty" value="1" min="1" class="form-control" style="width:90px">
            <a href="index.php?opt=cart"><button onclick="AddCart(<?= $product->id; ?>)" class="btn btn-success my-2" style="width:120px">Đặt hàng</button></a>

            <a href="index.php?opt=cart&addcat=<?= $product->id; ?>" class="btn btn-sm btn-success" style="width:120px">Thêm vào giỏ </a>
            <div class="col-md-6">

               <div class="bg-light float-left" style="width: 120px;">
                  4.8<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
               </div>
               <div class="bg-light float-left" style="width: 150px;">
                  8.642.000 Đánh giá
               </div>
               <div>
                  <h5 style="color: red;">Sản phẩm đã bán <i class="far fa-question-circle" style="color: red;"></i></h5>
               </div>
               <div>
                  <h5 style="color: red;">Vận chuyển: </h5><i class="fas fa-shipping-fast" style="color: red;"></i> vận chuyển nhanh
               </div>
               <div>
                  <p>
                  <h5 style="color: red;">Các đơn vị vận chuyển:</h5> Chuyển phát nhanh,EWP,ship code</p>
               </div>
            </div>
         </div>

      </div>
      <div class="row">
         <h2 class="text-main fs-4 pt-4">Sản phẩm khác</h2>
         <div class="product-category mt-3">
            <div class="row product-list">
               <div class="col-6 col-md-3 mb-4">
                  <div class="product-item border">
                     <div class="product-item-image">
                        <a href="product_detail.html">
                           <img src="public/images/product/thoi-trang-nam-1.jpg" class="img-fluid" alt="" id="img1">
                           <img class="img-fluid" src="public/images/product/thoi-trang-nam-2.jpg" alt="" id="img2">
                        </a>
                     </div>
                     <h2 class="product-item-name text-main text-center fs-5 py-1">
                        <a href="product_detail.html">Thời trang nam 1</a>
                     </h2>
                     <h3 class="product-item-price fs-6 p-2 d-flex">
                        <div class="flex-fill"><del>200.000đ</del></div>
                        <div class="flex-fill text-end text-main">190.000đ</div>
                     </h3>
                  </div>
               </div>
               <div class="col-6 col-md-3 mb-4">
                  <div class="product-item border">
                     <div class="product-item-image">
                        <a href="product_detail.html">
                           <img src="public/images/product/thoi-trang-nam-1.jpg" class="img-fluid" alt="" id="img1">
                           <img class="img-fluid" src="public/images/product/thoi-trang-nam-2.jpg" alt="" id="img2">
                        </a>
                     </div>
                     <h2 class="product-item-name text-main text-center fs-5 py-1">
                        <a href="product_detail.html">Thời trang nam 2</a>
                     </h2>
                     <h3 class="product-item-price fs-6 p-2 d-flex">
                        <div class="flex-fill"><del>200.000đ</del></div>
                        <div class="flex-fill text-end text-main">190.000đ</div>
                     </h3>
                  </div>
               </div>
               <div class="col-6 col-md-3 mb-4">
                  <div class="product-item border">
                     <div class="product-item-image">
                        <a href="product_detail.html">
                           <img src="public/images/product/thoi-trang-nam-1.jpg" class="img-fluid" alt="" id="img1">
                           <img class="img-fluid" src="public/images/product/thoi-trang-nam-2.jpg" alt="" id="img2">
                        </a>
                     </div>
                     <h2 class="product-item-name text-main text-center fs-5 py-1">
                        <a href="product_detail.html">Thời trang nam 2</a>
                     </h2>
                     <h3 class="product-item-price fs-6 p-2 d-flex">
                        <div class="flex-fill"><del>200.000đ</del></div>
                        <div class="flex-fill text-end text-main">190.000đ</div>
                     </h3>
                  </div>
               </div>
               <div class="col-6 col-md-3 mb-4">
                  <div class="product-item border">
                     <div class="product-item-image">
                        <a href="product_detail.html">
                           <img src="public/images/product/thoi-trang-nam-1.jpg" class="img-fluid" alt="" id="img1">
                           <img class="img-fluid" src="public/images/product/thoi-trang-nam-2.jpg" alt="" id="img2">
                        </a>
                     </div>
                     <h2 class="product-item-name text-main text-center fs-5 py-1">
                        <a href="product_detail.html">Thời trang nam 2</a>
                     </h2>
                     <h3 class="product-item-price fs-6 p-2 d-flex">
                        <div class="flex-fill"><del>200.000đ</del></div>
                        <div class="flex-fill text-end text-main">190.000đ</div>
                     </h3>
                  </div>
               </div>
               <div class="col-6 col-md-3 mb-4">
                  <div class="product-item border">
                     <div class="product-item-image">
                        <a href="product_detail.html">
                           <img src="public/images/product/thoi-trang-nam-1.jpg" class="img-fluid" alt="" id="img1">
                           <img class="img-fluid" src="public/images/product/thoi-trang-nam-2.jpg" alt="" id="img2">
                        </a>
                     </div>
                     <h2 class="product-item-name text-main text-center fs-5 py-1">
                        <a href="product_detail.html">Thời trang nam 2</a>
                     </h2>
                     <h3 class="product-item-price fs-6 p-2 d-flex">
                        <div class="flex-fill"><del>200.000đ</del></div>
                        <div class="flex-fill text-end text-main">190.000đ</div>
                     </h3>
                  </div>
               </div>
               <div class="col-6 col-md-3 mb-4">
                  <div class="product-item border">
                     <div class="product-item-image">
                        <a href="product_detail.html">
                           <img src="public/images/product/thoi-trang-nam-1.jpg" class="img-fluid" alt="" id="img1">
                           <img class="img-fluid" src="public/images/product/thoi-trang-nam-2.jpg" alt="" id="img2">
                        </a>
                     </div>
                     <h2 class="product-item-name text-main text-center fs-5 py-1">
                        <a href="product_detail.html">Thời trang nam 2</a>
                     </h2>
                     <h3 class="product-item-price fs-6 p-2 d-flex">
                        <div class="flex-fill"><del>200.000đ</del></div>
                        <div class="flex-fill text-end text-main">190.000đ</div>
                     </h3>
                  </div>
               </div>
               <div class="col-6 col-md-3 mb-4">
                  <div class="product-item border">
                     <div class="product-item-image">
                        <a href="product_detail.html">
                           <img src="public/images/product/thoi-trang-nam-1.jpg" class="img-fluid" alt="" id="img1">
                           <img class="img-fluid" src="public/images/product/thoi-trang-nam-2.jpg" alt="" id="img2">
                        </a>
                     </div>
                     <h2 class="product-item-name text-main text-center fs-5 py-1">
                        <a href="product_detail.html">Thời trang nam 2</a>
                     </h2>
                     <h3 class="product-item-price fs-6 p-2 d-flex">
                        <div class="flex-fill"><del>200.000đ</del></div>
                        <div class="flex-fill text-end text-main">190.000đ</div>
                     </h3>
                  </div>
               </div>
               <div class="col-6 col-md-3 mb-4">
                  <div class="product-item border">
                     <div class="product-item-image">
                        <a href="product_detail.html">
                           <img src="public/images/product/thoi-trang-nam-1.jpg" class="img-fluid" alt="" id="img1">
                           <img class="img-fluid" src="public/images/product/thoi-trang-nam-2.jpg" alt="" id="img2">
                        </a>
                     </div>
                     <h2 class="product-item-name text-main text-center fs-5 py-1">
                        <a href="product_detail.html">Thời trang nam 2</a>
                     </h2>
                     <h3 class="product-item-price fs-6 p-2 d-flex">
                        <div class="flex-fill"><del>200.000đ</del></div>
                        <div class="flex-fill text-end text-main">190.000đ</div>
                     </h3>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php require_once "footer.php"; ?>