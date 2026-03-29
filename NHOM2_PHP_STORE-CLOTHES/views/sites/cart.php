<?php 
use App\Models\Product;
use App\Models\Order;
use App\Cart;
use App\Models\User;
use App\Models\Orderdetail;

//them
if (isset($_GET['addcat']) && isset($_GET['quantity'])) {
    $id = $_GET['addcat'];
    $quantity = $_GET['quantity'];

    // Kiểm tra xem id sản phẩm và số lượng có tồn tại không
    if (!empty($id) && is_numeric($id) && !empty($quantity) && is_numeric($quantity) && $quantity > 0) {

        // Lấy thông tin sản phẩm từ CSDL
        $product = Product::find($id);

        // Nếu sản phẩm tồn tại
        if ($product) {
            // Tạo một mảng chứa thông tin sản phẩm
            $cart_item = array(
                'id' => $product->id,
                'qty' => $quantity, // Số lượng từ trường nhập
            );

            // Thêm giá và tổng tiền dựa trên số lượng
            if ($product->pricesale < $product->price) {
                $cart_item['price'] = $product->pricesale;
                $cart_item['amount'] = $product->pricesale * $cart_item['qty'];
            } else {
                $cart_item['price'] = $product->price;
                $cart_item['amount'] = $product->price * $cart_item['qty'];
            }

            // Kiểm tra nếu giỏ hàng đã tồn tại trong session
            if (isset($_SESSION['contentcart'])) {
                $carts = $_SESSION['contentcart'];
                // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
                if (Cart::cart_exists($carts, $id)) {
                    $carts = Cart::cart_update($carts, $id, $quantity);
                } else {
                    // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm vào giỏ hàng
                    $carts[] = $cart_item;
                }
            } else {
                // Nếu giỏ hàng chưa tồn tại, tạo mới giỏ hàng và thêm sản phẩm vào
                $carts[] = $cart_item;
            }

            // Lưu giỏ hàng vào session
            $_SESSION['contentcart'] =  $carts;
        }
    }
    // Chuyển hướng về trang giỏ hàng
    header("location:index.php?opt=cart");
}

if(isset($_REQUEST['delcart']))
{
   $id=$_REQUEST['delcart'];
   if(isset($_SESSION['contentcart']))
   {
    $carts=$_SESSION['contentcart'];
     $carts = Cart::cart_delete($carts,$id);
     $_SESSION['contentcart']= $carts;
   }
header("location:index.php?opt=cart");
}
if(isset($_POST['updateCart']))
{
    $arr_qty=$_POST['qty'];
    foreach($arr_qty as $id=>$number)
{
    $carts=$_SESSION['contentcart'];
    $carts= Cart::cart_update($carts,$id,$number,"update");
    $_SESSION['contentcart']= $carts;
}
header("location:index.php?opt=cart");
}
if (isset($_REQUEST['checkoutCart']))
{
    $date =getdate();
    $order = new order();
    $order->code = $date[0];
    $order->deliveryaddress =(isset($_POST['deliveryaddress']) ? $_POST['deliveryaddress']: $user['address']);
    $order->deliveryname=(isset($_POST['deliveryname']) ? $_POST['deliveryname']: $user['name']);
    $order->deliveryphone=(isset($_POST['deliveryphone']) ? $_POST['deliveryphone']: $user['phone']);
    $order->deliveryemail = (isset($_POST['deliveryemail']) ? $_POST['deliveryemail']: $user['email']);
    $order->created_at= date('Y-m-d H:i:s');
    $order->status = 2;
    if($order->save()) {
        $carts = $_SESSION['contentcart'];
        foreach ($carts as $cart) {
            $orderdetail = new Orderdetail();
            $orderdetail->order_id=$order->id;
            $orderdetail->product_id = $cart['id'];
            $orderdetail->price= $cart['price'];
            $orderdetail->qty=$cart['qty'];
            $orderdetail->amount= $cart ['amount'];
            $orderdetail->save();
        }
}
    unset($_SESSION['contentcart']);
    $_SESSION['message_alert']="successOder";
    header ("location:index.php?opt=cart");
}

if(isset($_REQUEST['checkout']))
{
require_once('views/sites/cart-checkout.php');
}
else{
    require_once('views/sites/cart-content.php');
}

