<?php

use App\Models\Product;

$content_cart = null;
if (isset($_SESSION['contentcart'])) {
   $content_cart = $_SESSION['contentcart'];
}
?>
<?php

$order_id = 1;
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$dbname = "nguyenthanhan_2121110226";
$db_connection = new mysqli($servername, $username, $password, $dbname);
if ($db_connection->connect_error) {
   die("Connection failed: " . $db_connection->connect_error);
}
$total_money = 0;

foreach ($content_cart as $cart) {
   $product_id = $cart['id'];
   $price = $cart['price'];
   $qty = $cart['qty'];
   $amount = $cart['amount'];

   $stmt = $db_connection->prepare("INSERT INTO 2121110226_orderdetail (order_id, product_id, price, qty, amount) VALUES (?, ?, ?, ?, ?)");
   $stmt->bind_param("iiidi", $order_id, $product_id, $price, $qty, $amount);
   $stmt->execute();

   $total_money += $amount;
}
?>
<?php require_once "views/sites/header.php"; ?>
<section class="bg-light">
   <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
         <ol class="breadcrumb py-2 my-0">
            <li class="breadcrumb-item">
               <a class="text-main" href="index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
               Thanh toán
            </li>
         </ol>
      </nav>
   </div>
</section>
<form action="index.php?opt=process_order" method="post">
   <section class="hdl-maincontent py-2">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <h2 class="fs-5 text-main">Thông tin giao hàng</h2>
               <p>Bạn có tài khoản chưa? <a href="index.php?opt=customer&f=login">Đăng nhập</a></p>
               <div class="mb-3">
                  <label for="deliveryname">Họ tên</label>
                  <input type="text" name="deliveryname" id="deliveryname" class="form-control" placeholder="Nhập họ tên">
               </div>
               <div class="mb-3">
                  <label for="deliveryphone">Điện thoại</label>
                  <input type="text" name="deliveryphone" id="deliveryphone" class="form-control" placeholder="Nhập điện thoại">
               </div>
               <div class="mb-3">
                  <label for="deliveryemail">Email</label>
                  <input type="text" name="deliveryemail" id="deliveryemail" class="form-control" placeholder="Nhập điện thoại">
               </div>
               <div class="card">
                  <div class="card-header text-main">
                     Địa chỉ nhận hàng
                  </div>
                  <div class="card-body">
                     <div class="mb-3">
                        <label for="deliveryaddress">Địa chỉ</label>
                        <input type="text" name="deliveryaddress" id="deliveryaddress" class="form-control" placeholder="Nhập địa chỉ">
                     </div>
                  </div>
               </div>
               <h4 class="fs-6 text-main mt-4">Phương thức thanh toán</h4>
               <div class="thanhtoan mb-4">
                  <div class="p-4 border">
                     <input name="typecheckout" onchange="showbankinfo(this.value)" type="radio" value="1" id="check1" />
                     <label for="check1">Thanh toán khi giao hàng</label>
                  </div>
               </div>
            </div>
            <script>
               function showbankinfo(value) {
                  var elementbank = document.querySelector(".bankinfo");
                  if (value == 1) {
                     elementbank.style.display = "none";
                  } else {
                     elementbank.style.display = "block";
                  }
               }
            </script>
            <div class="col-md-6">
               <h2 class="fs-5 text-main">Thông tin đơn hàng</h2>
               <?php if ($content_cart != null) : ?>
                  <table class="table table-bordered">
                     <tr>
                        <th>Id</th>
                        <th style="width: 100px;">Hình</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                     </tr>
                     <?php $total_money = 0; ?>
                     <?php foreach ($content_cart as $cart) : ?>
                        <?php
                        $product = Product::find($cart['id']);
                        ?>
                        <tr>
                           <td><?= $cart['id']; ?></td>
                           <td>
                              <img class="img-fluid" src="public/images/product/<?= $product->image; ?>" alt="<?= $product->image; ?>" style="width: 100px;">
                           </td>
                           <td><?= $product->name; ?></td>
                           <td><?= number_format($cart['price']); ?>VND</td>
                           <td>
                              <?= $cart['qty']; ?>
                           </td>
                           <td><?= number_format($cart['amount']); ?>VND</td>
                        </tr>
                        <?php $total_money += $cart['amount']; ?>
                     <?php endforeach; ?>
                  </table>
               <?php else : ?>
                  <h3>Chưa có sản phẩm trong giỏ hàng</h3>
               <?php endif; ?>
               <div>
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" placeholder="Mã giảm giá" aria-describedby="basic-addon2">
                     <span class="input-group-text" id="basic-addon2">Sử dụng</span>
                  </div>
               </div>
               <table class="table table-borderless">
                  <tr>
                     <th>Tạm tính</th>
                     <td class="text-end"><?= number_format($total_money); ?>VND</td>
                  </tr>
                  </tr>
                  <tr>
                     <th>Phí vận chuyển</th>
                     <td class="text-end">Free Ships</td>
                  </tr>
                  <tr>
                     <th>Tổng cộng</th>
                     <td class="text-end"><?= number_format($total_money); ?>VND</td>
                  </tr>
                  </tr>
               </table>

            </div>
            <div class="text-center" style="margin-left: 400px; margin-top:-150px">
               <button type="submit" class="btn btn-success px-4">XÁC NHẬN</button>
            </div>
         </div>
      </div>
   </section>

</form>
<?php require_once "views/sites/footer.php"; ?>