<?php

use App\Models\Product;

$content_cart = null;
if (isset($_SESSION['contentcart'])) {
    $content_cart = $_SESSION['contentcart'];
}
?>
<?php require_once('views/sites/header.php'); ?>
<!--section mainmenu-->
<form action="index.php?opt=cart" method="post">
    <section class="sliders text-center" >
        <div class="container">
            <h1 class="text-center">Giỏ hàng của bạn</h1>
            <?php if ($content_cart != null) : ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Check</th>
                        <th>Id</th>
                        <th style="width: 100px;">Hình</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                    </tr>
                    <?php $total_money = 0; ?>
                    <?php foreach ($content_cart as $cart) : ?>
                        <?php
                        $product = Product::find($cart['id']);
                        ?>
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="product_ids[]" value="<?= $product['id']; ?> ">

                            </td>
                            <td><?= $cart['id']; ?></td>
                            <td>
                                <img class="img-fluid" src="public/images/product/<?= $product->image; ?>" alt="<?= $product->image; ?>" style="width: 100px;">
                            </td>
                            <td><?= $product->name; ?></td>
                            <td><?= number_format($cart['price']); ?></td>
                            <td>
                                <input style="width: 50px" min="1" type="number" name="qty[<?= $cart['id']; ?>]" value="<?= $cart['qty']; ?>" />
                            </td>
                            <td><?= number_format($cart['amount']); ?></td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-danger" style="border-radius: 0px" href="index.php?opt=cart&delcart=<?= $cart['id']; ?>">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $total_money += $cart['amount']; ?>
                    <?php endforeach; ?>
                    <tr>

                        <th colspan="4"> <a class="btn btn-sm btn-danger" style="border-radius: 0px" href="index.php?opt=cart&delcart=all">
                                Xóa tất cả
                            </a>

                            <!-- <input type="submit" name="updateCart" class="btn btn-sm btn-info" value="Cập nhật"> -->
                            <form method="post" id="update-cart-form">
                                <input type="hidden" id="updated-quantity" value="0"> <!-- Hidden input to store updated quantity -->
                                <input type="submit" name="updateCart" class="btn btn-sm btn-info" style="border-radius: 0px" value="Cập nhật" id="update-cart-btn">
                            </form>

                            <a class="btn btn-sm btn-success" style="border-radius: 0px" href="index.php?opt=checkout">Thanh toán </a>
                        </th>

                        <th colspan="3" class="text-center">
                            <strong>TỔNG TIỀN:<?= number_format($total_money) . "VND"; ?></strong>
                        </th>
                    </tr>
                </table>
            <?php else : ?>
    <div class="text-center">
        <img src="public/images/giohang1.png" alt="No Product Image" class="img-fluid">
        
    </div>
<?php endif; ?>

        </div>
    </section>
</form>

<?php require_once('views/sites/footer.php'); ?>