<?php
use App\Models\Category;
use App\Models\Product;
use App\Phantrang;

$page = Phantrang::pageCurrent();
$limit = 8;
$skip = PhanTrang::pageOffset($page, $limit);
$total = Product::where('status', '=', 1)->count();

$slug = $_REQUEST['cat'];
$row_cat = Category::where('slug', '=', $slug)->first();
$list_catid = array();
array_push($list_catid, $row_cat->id);
$list_category1 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat->id]])
   ->get();

if (count($list_category1) > 0) {
   foreach ($list_category1 as $row_cat1) {
      array_push($list_catid, $row_cat1->id);
      $list_category2 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat1->id]])
         ->get();
      if (count($list_category2) > 0) {
         foreach ($list_category2 as $row_cat2) {
            array_push($list_catid, $row_cat2->id);
         }
      }
   }
}

$sortOption = isset($_GET['sort']) ? $_GET['sort'] : 'priceLowToHigh'; 
$list_product = Product::where('status', '=', 1)
    ->whereIn('category_id', $list_catid);

switch ($sortOption) {
    case 'discountHighToLow':
        $list_product->orderByDesc('discount');
        break;
    case 'discountLowToHigh':
        $list_product->orderBy('discount');
        break;
    case 'priceLowToHigh':
        $list_product->orderBy('price');
        break;
    case 'priceHighToLow':
        $list_product->orderByDesc('price');
        break;
    default:
        $list_product->orderBy('price');
}

$list_product = $list_product
    ->skip($skip)
    ->take($limit)
    ->get();

$strLink = PhanTrang::pageLinks($total, $page, $limit, 'index.php?opt=product&cat=' . $slug . '&sort=' . $sortOption);

require_once "views/sites/header.php";
?>
<section class="bg-light">
   <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
         <ol class="breadcrumb py-2 my-0">
            <li class="breadcrumb-item">
               <link class="text-main" href="#"><?= $row_cat->name; ?></link>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
               Sản phẩm theo loại
            </li>
            <li className="text-end mb-3" style="margin-left: 10px;">
               <label htmlFor="sortSelect" className="me-2 label-style">
                  Sắp xếp theo:
               </label>
               <select id="sortSelect" className="form-select select-style" onchange="window.location.href=this.value;">
                  <option value="?opt=product&cat=<?php echo $slug; ?>&sort=priceLowToHigh" <?php echo ($sortOption == 'priceLowToHigh') ? 'selected' : ''; ?>>Giá thấp đến cao</option>
                  <option value="?opt=product&cat=<?php echo $slug; ?>&sort=priceHighToLow" <?php echo ($sortOption == 'priceHighToLow') ? 'selected' : ''; ?>>Giá cao đến thấp</option>
               </select>
            </li>
         </ol>
      </nav>
   </div>
</section>
<section class="hdl-maincontent py-2">
   <div class="container">
      <div class="row">
         <div class="col-md-3 order-2 order-md-1">
            <?php require_once "views/sites/mod_listcategory.php"; ?>
            <?php require_once "views/sites/mod_listbrand.php"; ?>
            <?php require_once "views/sites/mod_product_new.php"; ?>
         </div>
         <div class="col-md-9 order-1 order-md-2">
            <div class="category-title bg-main">
               <h3 class="fs-5 py-3 text-center"><?= $row_cat->name; ?></h3>
            </div>
            <div class="product-category mt-3">
               <div class="row product-list">
                  <?php foreach ($list_product as $product) : ?>
                     <div class="col-6 col-md-3 mb-4">
                        <?php require('views/sites/product_item.php'); ?>
                     </div>
                  <?php endforeach; ?>
               </div>
            </div>
            <?= $strLink; ?>
         </div>
      </div>
   </div>
</section>
<?php require_once "views/sites/footer.php"; ?>
