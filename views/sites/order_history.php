<?php
use App\Models\Order;

if (!isset($_SESSION['user_id'])) {
    header("location:index.php?opt=customer&f=login");
    exit();
}

$user_id = $_SESSION['user_id'];
$orders = Order::where('user_id', $user_id)
    ->orderBy('created_at', 'DESC')
    ->get();

require_once('views/sites/header.php');
?>

<section class="maincontent my-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lịch sử mua hàng</li>
            </ol>
        </nav>

        <h2 class="text-center text-main mb-4">LỊCH SỬ MUA HÀNG</h2>

        <?php if (count($orders) > 0) : ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="bg-main text-white text-center">
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Họ tên người nhận</th>
                            <th>Số điện thoại</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) : ?>
                            <tr>
                                <td class="text-center">#<?= $order->id; ?></td>
                                <td class="text-center"><?= date('d/m/Y H:i', strtotime($order->created_at)); ?></td>
                                <td><?= $order->deliveryname; ?></td>
                                <td class="text-center"><?= $order->deliveryphone; ?></td>
                                <td class="text-center">
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
                                </td>
                                <td class="text-center">
                                    <a href="index.php?opt=order_history&slug=detail&id=<?= $order->id; ?>" class="btn btn-sm btn-info text-white">
                                        <i class="fa fa-eye"></i> Xem chi tiết
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <div class="alert alert-warning text-center">
                Bạn chưa có đơn hàng nào. <a href="index.php" class="alert-link">Mua sắm ngay!</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once('views/sites/footer.php'); ?>
