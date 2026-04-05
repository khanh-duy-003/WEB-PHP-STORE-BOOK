<?php

use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;

$orders = Order::where('status', '!=', 0)
   ->orderBy('created_at', 'DESC')
   ->get(); // Seclect * from order
$id = $_REQUEST['id'];
$order = Order::find($id);
$id = $_REQUEST['id'];
$orderdetail = Orderdetail::find($id);
$id = $_REQUEST['id'];
$product = Product::find($id);
$product_id = $orderdetail->product_id;
$product = Product::find($product_id);
?>
<?php require_once "../views/admin/header.php"; ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Chi tiết đơn hàng</h1>
      <div class="mt-1 text-end">
         <a class="btn btn-sm btn-primary" href="index.php?opt=order">
            <i class="fa fa-arrow-left"></i> Về danh sách
         </a>
      </div>
   </section>
   <section class="content-body my-2">

      <h3>Thông tin khách hàng</h3>
      <div class="row">
         <div class="col-md">
            <label><strong>Họ tên (*)</strong></label>
            <input type="text" name="name"  value="<?= $order->deliveryname; ?>" class="form-control" readonly />
         </div>
         <div class="col-md">
            <label><strong>Email (*)</strong></label>
            <input type="text" name="email" value="<?= $order->deliveryemail; ?>" class="form-control" readonly />
         </div>
         <div class="col-md">
            <label><strong>Điện thoại (*)</strong></label>
            <input type="text" name="phone" value="<?= $order->deliveryphone; ?>" class="form-control" readonly />
         </div>
         <div class="col-md-5">
            <label><strong>Địa chỉ (*)</strong></label>
            <input type="text" name="address" value="<?= $order->deliveryaddress; ?>" class="form-control" readonly />
         </div>
      </div>
      <h3>Chi tiết giỏ hàng</h3>
      <div class="row my-2">
         <div class="col-3">
            Tổng tiền: <strong><?= $orderdetail->price; ?></strong>
         </div>
         <div class="col-3">
            Ngày đặt: <strong><?= $order->created_at; ?></strong>
         </div>
         <div class="col-3">
            Hình thức đặt: <strong>Online</strong>
         </div>
         <div class="col-3">
            Trạng thái: <strong> <?= $order->status; ?></strong>
         </div>
      </div>
      <div class="row my-3">
         <div class="col-12">
            <table class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th class="text-center" style="width:90px;">Hình ảnh</th>
                     <th>Tên sản phẩm</th>
                     <th style="width:160px;" class="text-center">Giá</th>
                     <th style="width:90px;" class="text-center">Số lượng</th>
                     <th style="width:160px;" class="text-center">Thành tiền</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>
                        <img class="img-fluid" src="../public/images/product/<?= $product->image; ?>" alt="<?= $product->image; ?>  " style="width:90px;"/>
                     </td>
                     <td><?= $product->name; ?></td>
                     <td class="text-right"><?= $orderdetail->price; ?></td>
                     <td class="text-center"><?= $orderdetail->qty; ?></td>
                     <td class="text-right"><?= $orderdetail->qty * $orderdetail->price;?></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>