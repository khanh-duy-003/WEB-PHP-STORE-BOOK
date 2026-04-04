<?php 
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Orderdetail;

$total_product = Product::where('status', '!=', 0)->count();
$total_order = Order::where('status', '!=', 0)->count();
$total_user = User::where('status', '!=', 0)->count();
$total_revenue = Orderdetail::sum(\Illuminate\Database\Capsule\Manager::raw('qty * price'));

$recent_orders = Order::orderBy('created_at', 'DESC')->limit(5)->get();

require_once "../views/admin/header.php";
?>
   
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Bảng điều khiển hệ thống (Thống kê)</h1>
      <hr>
   </section>
   <section class="content-body my-2">
      <div class="row">
         <div class="col-md-3">
            <div class="card text-white bg-primary mb-3 shadow">
               <div class="card-body">
                  <div class="row">
                     <div class="col-4">
                        <i class="fa fa-shopping-bag fa-3x"></i>
                     </div>
                     <div class="col-8 text-end">
                        <h5 class="card-title text-uppercase">Sản phẩm</h5>
                        <h2 class="card-text"><?= $total_product; ?></h2>
                     </div>
                  </div>
               </div>
               <div class="card-footer d-flex align-items-center justify-content-between small">
                  <a class="text-white stretched-link" href="index.php?opt=product">Xem chi tiết</a>
                  <div class="text-white"><i class="fa fa-angle-right"></i></div>
               </div>
            </div>
         </div>
         <div class="col-md-3">
            <div class="card text-white bg-success mb-3 shadow">
               <div class="card-body">
                  <div class="row">
                     <div class="col-4">
                        <i class="fa fa-shopping-cart fa-3x"></i>
                     </div>
                     <div class="col-8 text-end">
                        <h5 class="card-title text-uppercase">Đơn hàng</h5>
                        <h2 class="card-text"><?= $total_order; ?></h2>
                     </div>
                  </div>
               </div>
               <div class="card-footer d-flex align-items-center justify-content-between small">
                  <a class="text-white stretched-link" href="index.php?opt=order">Xem chi tiết</a>
                  <div class="text-white"><i class="fa fa-angle-right"></i></div>
               </div>
            </div>
         </div>
         <div class="col-md-3">
            <div class="card text-white bg-warning mb-3 shadow">
               <div class="card-body">
                  <div class="row">
                     <div class="col-4">
                        <i class="fa fa-users fa-3x"></i>
                     </div>
                     <div class="col-8 text-end">
                        <h5 class="card-title text-uppercase">Khách hàng</h5>
                        <h2 class="card-text"><?= $total_user; ?></h2>
                     </div>
                  </div>
               </div>
               <div class="card-footer d-flex align-items-center justify-content-between small">
                  <a class="text-white stretched-link" href="index.php?opt=customer">Xem chi tiết</a>
                  <div class="text-white"><i class="fa fa-angle-right"></i></div>
               </div>
            </div>
         </div>
         <div class="col-md-3">
            <div class="card text-white bg-danger mb-3 shadow">
               <div class="card-body">
                  <div class="row">
                     <div class="col-4">
                        <i class="fa fa-money-bill-wave fa-3x"></i>
                     </div>
                     <div class="col-8 text-end">
                        <h5 class="card-title text-uppercase">Doanh thu</h5>
                        <h4 class="card-text text-nowrap"><?= number_format($total_revenue); ?> đ</h4>
                     </div>
                  </div>
               </div>
               <div class="card-footer d-flex align-items-center justify-content-between small">
                  <a class="text-white stretched-link" href="index.php?opt=order">Xem lịch sử thu nhập</a>
                  <div class="text-white"><i class="fa fa-angle-right"></i></div>
               </div>
            </div>
         </div>
      </div>

      <div class="row mt-4">
         <div class="col-md-12">
            <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
               <h5 class="mb-0"><i class="fas fa-history me-2 text-primary"></i> Các đơn hàng mới nhất</h5>
            </div>
            <div class="card-body p-0">
               <div class="table-responsive">
                  <table class="table table-hover align-middle mb-0">
                     <thead class="table-light">
                        <tr>
                           <th class="px-3" style="width: 80px;">ID</th>
                           <th>Khách hàng</th>
                           <th>Số điện thoại</th>
                           <th>Ngày đặt</th>
                           <th class="text-center">Trạng thái</th>
                           <th class="text-center">Hành động</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($recent_orders as $order): ?>
                        <tr>
                           <td class="px-3">#<?= $order->id ?></td>
                           <td class="fw-bold"><?= $order->deliveryname ?: '#' ?></td>
                           <td><?= $order->deliveryphone ?: '#' ?></td>
                           <td><?= date('d/m/Y H:i', strtotime($order->created_at)) ?></td>
                           <td class="text-center">
                              <?php 
                                 switch($order->status) {
                                    case 1: echo '<span class="badge bg-info">Mới</span>'; break;
                                    case 2: echo '<span class="badge bg-primary">Xác nhận</span>'; break;
                                    case 3: echo '<span class="badge bg-warning text-dark">Giao hàng</span>'; break;
                                    case 4: echo '<span class="badge bg-success">Hoàn thành</span>'; break;
                                    case 0: echo '<span class="badge bg-danger">Hủy</span>'; break;
                                    default: echo '<span class="badge bg-secondary">#</span>'; break;
                                 }
                              ?>
                           </td>
                           <td class="text-center">
                              <a href="index.php?opt=order&cat=show&id=<?= $order->id ?>" class="btn btn-sm btn-outline-info" title="Xem chi tiết">
                                 <i class="fas fa-eye"></i> Chi tiết
                              </a>
                           </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if (count($recent_orders) == 0): ?>
                           <tr>
                              <td colspan="6" class="text-center py-3">Chưa có đơn hàng nào.</td>
                           </tr>
                        <?php endif; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php"; ?>