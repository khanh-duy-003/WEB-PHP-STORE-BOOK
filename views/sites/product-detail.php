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

<?php require_once('views/sites/header.php'); ?>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0" nonce="yUJOnlAL"></script>
<section class="maincontent my-4">
    <section class="container my-4">
        <div class="container">
            <div class="row">

                <style>
                    .product-image-container {
                        width: 350px;
                        height: 350px;
                        overflow: hidden;
                    }

                    .product-image-container img {
                        object-fit: cover;
                        width: 100%;
                        height: 100%;
                    }

                    .list-image .col-3 img {
                        max-width: 70%;
                        /* Ensure images don't exceed the width of their container */
                        height: auto;
                        /* Maintain aspect ratio */
                    }
                </style>

                <div class="col-md-6">

                    <div class="product-image-container" style="margin-left: 30px; height:500px ;">
                        <img id="productimage" class="img-fluid w-100" src="public/images/product/<?= $product->image; ?>" alt="Product Image" />
                    </div>
                    <div class="list-image mt-3">
                        <div class="row">
                            <div class="col-2">
                                <img class="img-fluid w-100" src="public/images/product/<?= $product->image; ?>" alt="Product Image" onclick="changeimage(src)" />
                            </div>
                            <?php if (!empty($product->image1)) : ?>
                            <div class="col-2">
                                <img class="img-fluid w-100" src="public/images/product/<?= $product->image1; ?>" alt="Product Image" onclick="changeimage(src)" />
                            </div>
                            <?php endif; ?>
                            <?php if (!empty($product->image2)) : ?>
                            <div class="col-2">
                                <img class="img-fluid w-100" src="public/images/product/<?= $product->image2; ?>" alt="Product Image" onclick="changeimage(src)" />
                            </div>
                            <?php endif; ?>
                            <?php if (!empty($product->image3)) : ?>
                            <div class="col-2">
                                <img class="img-fluid w-100" src="public/images/product/<?= $product->image3; ?>" alt="Product Image" onclick="changeimage(src)" />
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <script>
                    function changeimage(src) {
                        document.getElementById("productimage").src = src;
                    }
                </script>
                
                <div class="col-md-6" >
                    <h1 class="fs-2"><?= $product->name ?></h1>
                    <b class="fs-2"><?= $product->metadesc; ?></b>
                    <div style="display: flex; align-items: center;">
                        <?php
                        if ($product->pricesale < $product->price) {
                            echo '<span style="color: red; margin-right: 10px;"> <del>Giá gốc: ' . number_format($product->price) . 'đ</del></span>';
                        } else {
                            echo '<span style="color: black;">Giá gốc: ' . number_format($product->price) . 'đ</span>';
                        }
                        ?>

                        <?php if ($product->pricesale < $product->price) : ?>
                            <div class="text-main" style="margin-left: 10px;">
                                <span style="color: black;">Giá Khuyến Mãi: <?= number_format($product->pricesale) ?>đ</span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <style>
                        .quantity-input {
                            display: flex;
                            align-items: center;
                        }

                        .quantity-input button {
                            border: none;
                            background: none;
                            cursor: pointer;
                            font-size: 1em;
                            padding: 0;
                            margin: 0;
                        }

                        .quantity-input button:hover {
                            color: blue;
                            /* Màu khi rê chuột qua */
                        }

                        .quantity-input button:first-child {
                            margin-right: 5px;
                        }

                        .input-container input {
                            width: 120px;
                            margin-right: 10px;
                            border-radius: 0;
                            /* Góc vuông */
                        }
                    </style>
                    <div style="display: flex; align-items: center;">
                        <div class="input-container">
                            <a id="quantity-label">Chọn số lượng:</a>
                            <div class="quantity-input text-center">
                                <input type="number" id="qty" name="qty" value="1" min="1" class="form-control" oninput="updateLabel(this.value)">
                            </div>
                        </div>
                        <a style="margin-top:25px; margin-left: 20px;">
                            <button onclick="addToCartAndCheckout(<?= $product->id; ?>)" style="width: 150px; border-radius: 0;" class="btn btn-outline-dark my-2">Đặt hàng</button>

                            <script>
                                function addToCartAndCheckout(productId) {
                                    var quantity = document.getElementById('qty').value;

                                    var xhr = new XMLHttpRequest();
                                    xhr.open("GET", "index.php?opt=cart&addcat=" + productId + "&quantity=" + quantity, true);

                                    xhr.onreadystatechange = function() {
                                        if (xhr.readyState == 4 && xhr.status == 200) {
                                            window.location.href = "index.php?opt=checkout";
                                        }
                                    };

                                    xhr.send();
                                }
                            </script>

                        </a>
                    </div>


                    <script>
                        function updateLabel(value) {
                            var quantityLabel = document.getElementById('quantity-label');
                            quantityLabel.textContent = 'Chọn số lượng: ' + value;
                        }
                    </script>


                    <style>
                        .btn-outline-orange {
                            color: black;
                            background-color: transparent;
                            border-color: #FFA500;
                        }

                        .btn-outline-orange:hover {
                            color: #fff;
                            background-color: #FFA500;
                            border-color: #FFA500;
                        }
                    </style>
                    <a onclick="addToCartAndCheckout1(<?= $product->id; ?>)" style="margin-left: 150px; hight:30px; width:150px;border-radius: 0;" href="index.php?opt=cart&addcat=<?= $product->id; ?> " class="btn btn-sm btn-outline-orange my-2">Thêm vào giỏ </a>
                    <script>
                        function addToCartAndCheckout1(productId) {
                            var quantity = document.getElementById('qty').value;

                            var xhr = new XMLHttpRequest();
                            xhr.open("GET", "index.php?opt=cart&addcat=" + productId + "&quantity=" + quantity, true);


                            xhr.send();
                        }
                    </script>
                    <div class="col-md-6">

                        <style>
                            .yellow-stars {
                                color: gold;
                            }
                        </style>
                        <div style="margin-top: -50px;">
                            <div class="bg-light float-left" style="width: 120px; display: flex; align-items: center;">
                                <span class="yellow-stars" style="margin-right: 5px;">4.8</span>
                                <i class="fas fa-star yellow-stars"></i>
                                <i class="fas fa-star yellow-stars"></i>
                                <i class="fas fa-star yellow-stars"></i>
                                <i class="fas fa-star yellow-stars"></i>
                                <i class="far fa-star yellow-stars"></i>
                            </div>
                            <div class="float-left" style="width: 150px;">
                                8.642.000 Đánh giá
                            </div>
                        </div>

                        <div>
                            <div style="color: black;">Đã bán 26,3k</i></i></div>
                        </div>
                        <div>
                            <div style="color: #00FFFF; font-size:20px">Vận chuyển: </div><i class="fas fa-shipping-fast" style="color: #00FFFF;"></i> Vận chuyển nhanh
                        </div>
                        <div>
                            <p>
                            <div style="color: #00FFFF;font-size:20px;">Các đơn vị vận chuyển: </div> Chuyển phát nhanh, EWP, ship code</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row my-4">
                <div class="col-md-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Sản phẩm khác</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane-info" type="button" role="tab" aria-controls="profile-tab-pane-info" aria-selected="true">Thông tin sản phẩm</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments-tab-pane" type="button" role="tab" aria-controls="comments-tab-pane" aria-selected="false">Bình luận</button>
                        </li>
                        <li class="nav-item " style="color: red;" role="presentation">
                            <button class="nav-link" id="like-tab" data-bs-toggle="tab" data-bs-target="#like-tab-pane" type="button" role="tab" aria-controls="like-tab-pane" aria-selected="false">Like</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="row ">
                                <?php foreach ($product_list as $item) : ?>
                                    <div class="col-md-3 ">
                                        <div class="product-item border mb-3">
                                            <div class="product-item-image">
                                                <a href="index.php?opt=product&slug=<?= $item->slug; ?>">
                                                    <img src="public/images/product/<?= $item->image; ?>" class="img-fluid" alt="" id="img1">
                                                    <img class="img-fluid" src="public/images/product/<?= $item->image1; ?>" alt="" id="img2">
                                                </a>
                                            </div>
                                            <h2 class="product-item-name text-main text-center fs-5 py-1">
                                                <h4 class="text-center" style="color:black;" href="index.php?opt=product&slug=<?= $item->slug; ?>"><?= $item->name; ?></h4>
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
                                <!--end col-mb-3-->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane-info" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <h5 class="strong"><?= $product->detail; ?></h5>
                        </div>

                        <div class="tab-pane fade" id="comments-tab-pane" role="tabpanel" aria-labelledby="comments-tab" tabindex="0">
                            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="10"></div>
                        </div>

                        <div class="tab-pane fade" id="like-tab-pane" role="tabpanel" aria-labelledby="like-tab" tabindex="0">
                            <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="" data-layout="" data-action="" data-size="" data-share="true"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function AddCart(productid) {
            var qty = document.querySelector('#qty').value
            alert(productid + " số lượng " + qty)
        }
    </script>
    <?php require_once('views/sites/footer.php'); ?>