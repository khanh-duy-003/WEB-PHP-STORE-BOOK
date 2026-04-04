<?php

use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;

$id = $_REQUEST['id'];
$order = Order::find($id);

// Lấy danh sách sản phẩm trong đơn hàng
$orderdetails = Orderdetail::where('order_id', $id)->get();

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

      <div class="row">
         <div class="col-md-9">
            <h3>Thông tin khách hàng</h3>
            <div class="row">
               <div class="col-md">
                  <label><strong>Họ tên (*)</strong></label>
                  <input type="text" name="name" value="<?= $order->deliveryname; ?>" class="form-control" readonly />
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
            <h3 class="mt-3">Chi tiết giỏ hàng</h3>
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
                  <?php 
                  $total_money = 0;
                  foreach($orderdetails as $detail): 
                     $product = Product::find($detail->product_id);
                     $subtotal = $detail->qty * $detail->price;
                     $total_money += $subtotal;
                  ?>
                  <tr>
                     <td class="text-center">
                        <img class="img-fluid" src="../public/images/product/<?= $product->image; ?>" alt="<?= $product->image; ?>" style="width:60px;" />
                     </td>
                     <td><?= $product->name; ?></td>
                     <td class="text-center"><?= number_format($detail->price); ?> VNĐ</td>
                     <td class="text-center"><?= $detail->qty; ?></td>
                     <td class="text-center text-danger"><strong><?= number_format($subtotal); ?> VNĐ</strong></td>
                  </tr>
                  <?php endforeach; ?>
                  <tr>
                     <td colspan="4" class="text-end text-uppercase"><strong>Tổng tiền:</strong></td>
                     <td class="text-center text-danger"><strong><?= number_format($total_money); ?> VNĐ</strong></td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="col-md-3">
            <div class="card p-3 shadow-sm">
               <h4 class="text-primary"><i class="fa fa-cog"></i> Xử lý đơn hàng</h4>
               <hr>
               <div class="mb-3">
                  <label><strong>Trạng thái hiện tại:</strong></label>
                  <span class="badge bg-info">
                     <?php 
                        switch($order->status) {
                           case 1: echo "Đơn hàng mới"; break;
                           case 2: echo "Đã xác nhận"; break;
                           case 3: echo "Đang giao hàng"; break;
                           case 4: echo "Đã hoàn thành"; break;
                           case 0: echo "Đã hủy"; break;
                           default: echo "Không xác định"; break;
                        }
                     ?>
                  </span>
               </div>
               <div class="d-grid gap-2">
                  <?php if($order->status == 1): ?>
                     <a href="index.php?opt=order&cat=status&id=<?= $order->id; ?>" class="btn btn-success">Xác nhận đơn hàng</a>
                  <?php elseif($order->status == 2): ?>
                     <a href="index.php?opt=order&cat=status&id=<?= $order->id; ?>" class="btn btn-primary">Giao hàng</a>
                  <?php elseif($order->status == 3): ?>
                     <a href="index.php?opt=order&cat=status&id=<?= $order->id; ?>" class="btn btn-warning">Hoàn thành</a>
                  <?php endif; ?>
                  
                  <?php if($order->status != 0 && $order->status != 4): ?>
                     <a href="index.php?opt=order&cat=delete&id=<?= $order->id; ?>" class="btn btn-danger mt-3">Hủy đơn hàng</a>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>