<?php 
use App\Models\Order;

$id = $_REQUEST["id"];
$order = Order::where('id', '=', $id)->first();
if($order==null){
    set_flash("message", ["type"=> "danger", "msg" =>"Mẫu tin không tồn tại"]);
    header("location:index.php?opt=order");

}
if($order->status == 1) {
    $order->status = 2;
} elseif($order->status == 2) {
    $order->status = 3;
} elseif($order->status == 3) {
    $order->status = 4;
}
$order->updated_at = date('Y-m-d H:i:s');
$order->updated_by = $_SESSION["user_id"] ?? 1;
$order->save();
set_flash("message", ["type"=> "success", "msg" =>"Cập nhật trạng thái đơn hàng thành công"]);

// Quay lại trang chi tiết nếu đang ở đó, hoặc danh sách
if (isset($_SERVER['HTTP_REFERER'])) {
    header("location:" . $_SERVER['HTTP_REFERER']);
} else {
    header("location:index.php?opt=order");
}

