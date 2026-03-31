<?php

use App\Models\Product;

// Kiểm tra xem giỏ hàng có dữ liệu không, nếu không thì đuổi về trang chủ
if (!isset($_SESSION['contentcart']) || empty($_SESSION['contentcart'])) {
   echo "<script>alert('Giỏ hàng trống!'); window.location.href='index.php';</script>";
   exit();
}

$content_cart = $_SESSION['contentcart'];
$total_money = 0;


// Giả lập lấy thông tin user nếu đã đăng nhập (Bạn tự điều chỉnh theo hệ thống của bạn)
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
?>

<?php require_once "views/sites/header.php"; ?>

<section class="bg-light">
   <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
         <ol class="breadcrumb py-2 my-0">
            <li class="breadcrumb-item"><a class="text-main" href="index.php">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
         </ol>
      </nav>
   </div>
</section>

<form action="index.php?opt=process_order" method="post">

   <?php
   foreach ($content_cart as $cart) {
      $total_money += $cart['amount'];
   }
   ?>
   <input type="hidden" name="total_amount" value="<?= $total_money ?>">

   <section class="hdl-maincontent py-2">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <h2 class="fs-5 text-main">Thông tin giao hàng</h2>
               <?php if (!$user): ?>
                  <p>Bạn có tài khoản chưa? <a href="index.php?opt=customer&f=login">Đăng nhập</a></p>
               <?php endif; ?>

               <div class="mb-3">
                  <label for="deliveryname">Họ tên</label>
                  <input type="text" name="deliveryname" class="form-control"
                     value="<?= isset($_SESSION['fullname']) ? $_SESSION['fullname'] : '' ?>" required>
               </div>
               <div class="mb-3">
                  <label for="deliveryphone">Điện thoại</label>
                  <input type="text" name="deliveryphone" class="form-control"
                     value="<?= isset($_SESSION['phone']) ? $_SESSION['phone'] : '' ?>" required>
               </div>
               <div class="mb-3">
                  <label for="deliveryemail">Email</label>
                  <input type="email" name="deliveryemail" class="form-control"
                     value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>" required>
               </div>

               <div class="card mb-4">
                  <div class="card-header text-main">Địa chỉ nhận hàng</div>
                  <div class="card-body">
                     <div class="mb-3">
                        <label for="deliveryaddress">Địa chỉ chi tiết</label>
                        <input type="text" name="deliveryaddress" id="deliveryaddress" class="form-control" placeholder="Nhập địa chỉ" value="<?= $user ? $user['address'] : '' ?>" required>
                     </div>
                  </div>
               </div>

               <h4 class="fs-6 text-main mt-4">Phương thức thanh toán</h4>
               <div class="thanhtoan mb-4">
                  <div class="p-3 border rounded mb-2">
                     <input name="payment_method" type="radio" value="COD" id="cod" checked />
                     <label for="cod" class="fw-bold">Thanh toán khi nhận hàng (COD)</label>
                  </div>
                  <div class="p-3 border rounded">
                     <input name="payment_method" type="radio" value="VNPAY" id="vnpay" />
                     <label for="vnpay" class="fw-bold text-primary">Thanh toán Online (VNPAY)</label>
                  </div>
               </div>
            </div>

            <div class="col-md-6">
               <h2 class="fs-5 text-main">Thông tin đơn hàng</h2>
               <table class="table table-bordered bg-white">
                  <thead>
                     <tr class="bg-light">
                        <th style="width: 80px;">Hình</th>
                        <th>Tên sản phẩm</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-end">Thành tiền</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($content_cart as $cart) : ?>
                        <?php $product = Product::find($cart['id']); ?>
                        <tr>
                           <td class="text-center">
                              <img src="public/images/product/<?= $product->image; ?>" alt="<?= $product->name; ?>" style="height: 60px; object-fit: cover;">
                           </td>
                           <td class="align-middle"><?= $product->name; ?></td>
                           <td class="text-center align-middle">x<?= $cart['qty']; ?></td>
                           <td class="text-end align-middle fw-bold"><?= number_format($cart['amount']); ?> đ</td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>

               <table class="table table-borderless">
                  <tr>
                     <th>Tạm tính</th>
                     <td class="text-end"><?= number_format($total_money); ?> đ</td>
                  </tr>
                  <tr>
                     <th>Phí vận chuyển</th>
                     <td class="text-end">Miễn phí</td>
                  </tr>
                  <tr class="border-top">
                     <th class="fs-5 text-danger">Tổng cộng</th>
                     <td class="text-end fs-5 fw-bold text-danger"><?= number_format($total_money); ?> đ</td>
                  </tr>
               </table>

               <div class="text-end mt-4">
                  <button type="submit" name="btn_confirm_checkout" class="btn btn-danger btn-lg px-5 fw-bold">XÁC NHẬN ĐẶT HÀNG</button>
               </div>
            </div>
         </div>
      </div>
   </section>
</form>

<?php require_once "views/sites/footer.php"; ?>