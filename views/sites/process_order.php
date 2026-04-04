<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Nhận dữ liệu từ Form Checkout
    $deliveryname = isset($_POST['deliveryname']) ? $_POST['deliveryname'] : '';
    $deliveryphone = isset($_POST['deliveryphone']) ? $_POST['deliveryphone'] : '';
    $deliveryaddress = isset($_POST['deliveryaddress']) ? $_POST['deliveryaddress'] : '';
    $deliveryemail = isset($_POST['deliveryemail']) ? $_POST['deliveryemail'] : '';

    // Nhận thêm phương thức thanh toán và tổng tiền từ Form
    $payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : 'COD';
    $total_amount = isset($_POST['total_amount']) ? $_POST['total_amount'] : 0;

    $created_at = date('Y-m-d H:i:s');

    // 2. Cấu hình Database mới (Theo file fashion_shop (3).sql)
    $servername = '127.0.0.1:3307'; // Vẫn giữ port 3307 của bạn
    $username = 'root';
    $password = '';
    $database = 'fashion_shop'; // Tên DB mới siêu gọn gàng
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {

        // Kiểm tra xem khách hàng đã đăng nhập chưa
        if (isset($_SESSION['user_id'])) {
            // Lấy ID của khách hàng đang đăng nhập
            $user_id = $_SESSION['user_id'];
        } else {
            // Nếu chưa đăng nhập (khách vãng lai mua hàng) thì gán ID = 0
            $user_id = 0;
        }


        $stmt = $conn->prepare("INSERT INTO `order` (user_id, deliveryname, deliveryphone, deliveryaddress, deliveryemail, created_at, status) VALUES (?, ?, ?, ?, ?, ?, 1)");
        $stmt->bind_param("isssss", $user_id, $deliveryname, $deliveryphone, $deliveryaddress, $deliveryemail, $created_at);

        if ($stmt->execute()) {


            $order_id = $conn->insert_id;


            if (isset($_SESSION['contentcart'])) {

                $stmt_detail = $conn->prepare("INSERT INTO `orderdetail` (order_id, product_id, price, qty, amount) VALUES (?, ?, ?, ?, ?)");


                foreach ($_SESSION['contentcart'] as $cart) {
                    $product_id = $cart['id'];
                    $price = $cart['price'];
                    $qty = $cart['qty'];
                    $amount = $cart['amount'];

                    $stmt_detail->bind_param("iiidi", $order_id, $product_id, $price, $qty, $amount);
                    $stmt_detail->execute();
                }
                $stmt_detail->close();
            }


            if ($payment_method == 'COD') {

                unset($_SESSION['contentcart']);
                echo '<script>';
                echo 'alert("Đơn hàng đã được đặt thành công (Thanh toán khi nhận hàng)!");';
                echo 'window.location.href = "index.php";';
                echo '</script>';
                exit();
            } elseif ($payment_method == 'VNPAY') {

                error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                date_default_timezone_set('Asia/Ho_Chi_Minh');

                // ⚠️ NHỚ THAY 2 MÃ NÀY BẰNG MÃ TRONG EMAIL CỦA BẠN ⚠️
                $vnp_TmnCode = "5MJZSZ8G";
                $vnp_HashSecret = "RQUWX9O0IB6Y6TJZI8EO0QVZJNVGALUW";
                $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";


                $vnp_Returnurl = "http://localhost/WEB-PHP-STORE-CLOTHES/NHOM2_PHP_STORE-CLOTHES/index.php?opt=vnpay_return";

                $vnp_TxnRef = $order_id;
                $vnp_OrderInfo = "Thanh toan don hang " . $order_id;
                $vnp_OrderType = 'billpayment';
                $vnp_Amount = $total_amount * 100; // VNPAY yêu cầu nhân 100
                $vnp_Locale = 'vn';
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

                $inputData = array(
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => $vnp_OrderType,
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $vnp_TxnRef
                );

                ksort($inputData);
                $query = "";
                $i = 0;
                $hashdata = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                    } else {
                        $hashdata .= urlencode($key) . "=" . urlencode($value);
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }

                $vnp_Url = $vnp_Url . "?" . $query;
                if (isset($vnp_HashSecret)) {
                    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                }

                // Chuyển hướng sang VNPAY
                header('Location: ' . $vnp_Url);
                die();
            }
        } else {
            echo "Lỗi khi lưu đơn hàng (" . $stmt->errno . "): " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
