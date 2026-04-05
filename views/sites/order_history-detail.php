<?php
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;

if (!isset($_SESSION['user_id'])) {
    header("location:index.php?opt=customer&f=login");
    exit();
}

$id = $_REQUEST['id'];
$user_id = $_SESSION['user_id'];
$order = Order::find($id);

// Check if the order belongs to the user
if (!$order || $order->user_id != $user_id) {
    header("location:index.php?opt=order_history");
    exit();
}

$orderdetails = Orderdetail::where('order_id', $id)->get();

require_once('views/sites/header.php');
?>

<section class="maincontent my-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="index.php?opt=order_history">Lịch sử mua hàng</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng #<?= $order->id; ?></li>
            </ol>
        </nav>

        <h2 class="text-center text-main mb-4">CHI TIẾT ĐƠN HÀNG #<?= $order->id; ?></h2>

        <div class="row">
            <div class="col-md-5">
                <div class="card p-3 shadow-sm mb-4">
                    <h3>Thông tin người nhận</h3>
                    <p><strong>Ngày đặt:</strong> <?= date('d/m/Y H:i', strtotime($order->created_at)); ?></p>
                    <p><strong>Họ tên:</strong> <?= $order->deliveryname; ?></p>
                    <p><strong>Điện thoại:</strong> <?= $order->deliveryphone; ?></p>
                    <p><strong>Email:</strong> <?= $order->deliveryemail; ?></p>
                    <p><strong>Địa chỉ:</strong> <?= $order->deliveryaddress; ?></p>
                    <p><strong>Trạng thái:</strong> 
                        <?php 
                            switch($order->status) {
                                case 1: echo '<span class="badge bg-info">Mới đặt</span>'; break;
                                case 2: echo '<span class="badge bg-primary">Đã xác nhận</span>'; break;
                                case 3: echo '<span class="badge bg-warning text-dark">Đang giao hàng</span>'; break;
                                case 4: echo '<span class="badge bg-success">Đã hoàn thành</span>'; break;
                                case 0: echo '<span class="badge bg-danger">Đã hủy</span>'; break;
                                default: echo '<span class="badge bg-secondary">Không xác định</span>'; break;
                            }
                        ?>
                    </p>
                </div>
            </div>
            <div class="col-md-7">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="bg-main text-white">
                            <tr>
                                <th class="text-center" style="width:90px;">Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th style="width:120px;" class="text-center">Giá</th>
                                <th style="width:70px;" class="text-center">SL</th>
                                <th style="width:140px;" class="text-center">Thành tiền</th>
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
                                    <img class="img-fluid" src="public/images/product/<?= $product->image; ?>" alt="<?= $product->image; ?>" style="width:60px;" />
                                </td>
                                <td><?= $product->name; ?></td>
                                <td class="text-center small"><?= number_format($detail->price); ?> đ</td>
                                <td class="text-center"><?= $detail->qty; ?></td>
                                <td class="text-center text-danger"><strong><?= number_format($subtotal); ?> đ</strong></td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4" class="text-end text-uppercase"><strong>Tổng tiền thanh toán:</strong></td>
                                <td class="text-center text-danger fw-bold fs-5"><?= number_format($total_money); ?> đ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="text-center mt-3">
             <a href="index.php?opt=order_history" class="btn btn-secondary">
                 <i class="fa fa-arrow-left"></i> Quay lại lịch sử mua hàng
             </a>
        </div>
    </div>
</section>

<?php require_once('views/sites/footer.php'); ?>
