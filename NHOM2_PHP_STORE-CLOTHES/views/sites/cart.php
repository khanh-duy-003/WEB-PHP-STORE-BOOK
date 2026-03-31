<?php

use App\Models\Product;
use App\Models\Order;
use App\Cart;
use App\Models\User;
use App\Models\Orderdetail;


//them vao gio hang
if (isset($_GET['addcat'])) {
    $id = $_GET['addcat'];


    $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;


    if (!empty($id) && is_numeric($id) && is_numeric($quantity) && $quantity > 0) {


        $product = Product::find($id);


        if ($product) {

            $cart_item = array(
                'id' => $product->id,
                'qty' => $quantity,
            );


            if ($product->pricesale < $product->price && $product->pricesale > 0) {
                $cart_item['price'] = $product->pricesale;
                $cart_item['amount'] = $product->pricesale * $cart_item['qty'];
            } else {
                $cart_item['price'] = $product->price;
                $cart_item['amount'] = $product->price * $cart_item['qty'];
            }


            if (isset($_SESSION['contentcart'])) {
                $carts = $_SESSION['contentcart'];

                if (Cart::cart_exists($carts, $id)) {
                    $carts = Cart::cart_update($carts, $id, $quantity);
                } else {
                    $carts[] = $cart_item;
                }
            } else {
                $carts[] = $cart_item;
            }

            $_SESSION['contentcart'] =  $carts;
        }
    }

    $redirect_url = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "index.php";

    echo '<!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đang xử lý...</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style> body { background-color: #f4f6f9; } </style>
    </head>
    <body>
        <script>
            // Bật Pop-up đẹp mắt
            Swal.fire({
                title: "Thành công!",
                text: "Đã thêm sản phẩm vào giỏ hàng",
                icon: "success",
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                // Đóng xong thì tự động chuyển về trang cũ
                window.location.href = "' . $redirect_url . '";
            });
        </script>
    </body>
    </html>';

    exit();
}

if (isset($_REQUEST['delcart'])) {
    $id = $_REQUEST['delcart'];
    if (isset($_SESSION['contentcart'])) {
        $carts = $_SESSION['contentcart'];
        $carts = Cart::cart_delete($carts, $id);
        $_SESSION['contentcart'] = $carts;
    }
    header("location:index.php?opt=cart");
}
if (isset($_POST['updateCart'])) {
    $arr_qty = $_POST['qty'];
    foreach ($arr_qty as $id => $number) {
        $carts = $_SESSION['contentcart'];
        $carts = Cart::cart_update($carts, $id, $number, "update");
        $_SESSION['contentcart'] = $carts;
    }
    header("location:index.php?opt=cart");
}
if (isset($_REQUEST['checkoutCart'])) {
    $date = getdate();
    $order = new order();
    $order->code = $date[0];
    $order->deliveryaddress = (isset($_POST['deliveryaddress']) ? $_POST['deliveryaddress'] : $user['address']);
    $order->deliveryname = (isset($_POST['deliveryname']) ? $_POST['deliveryname'] : $user['name']);
    $order->deliveryphone = (isset($_POST['deliveryphone']) ? $_POST['deliveryphone'] : $user['phone']);
    $order->deliveryemail = (isset($_POST['deliveryemail']) ? $_POST['deliveryemail'] : $user['email']);
    $order->created_at = date('Y-m-d H:i:s');
    $order->status = 2;
    if ($order->save()) {
        $carts = $_SESSION['contentcart'];
        foreach ($carts as $cart) {
            $orderdetail = new Orderdetail();
            $orderdetail->order_id = $order->id;
            $orderdetail->product_id = $cart['id'];
            $orderdetail->price = $cart['price'];
            $orderdetail->qty = $cart['qty'];
            $orderdetail->amount = $cart['amount'];
            $orderdetail->save();
        }
    }
    unset($_SESSION['contentcart']);
    $_SESSION['message_alert'] = "successOder";
    header("location:index.php?opt=cart");
}

if (isset($_REQUEST['checkout'])) {
    require_once('views/sites/cart-checkout.php');
} else {
    require_once('views/sites/cart-content.php');
}
