<?php

$vnp_HashSecret = "RQUWX9O0IB6Y6TJZI8EO0QVZJNVGALUW";

$vnp_SecureHash = $_GET['vnp_SecureHash'];
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}

unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}


$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
$isValidSignature = ($secureHash === $vnp_SecureHash);

$order_id = $_GET['vnp_TxnRef'];
$amount = $_GET['vnp_Amount'] / 100;
?>

<?php require_once "views/sites/header.php"; ?>

<section class="bg-light py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center bg-white p-5 rounded shadow-sm border">

                <?php if ($isValidSignature): ?>
                    <?php if ($_GET['vnp_ResponseCode'] == '00'): ?>
                        <?php

                        $servername = '127.0.0.1:3307';
                        $username = 'root';
                        $password = '';
                        $database = 'fashion_shop';
                        $conn = new mysqli($servername, $username, $password, $database);

                        if (!$conn->connect_error) {
                            $sql_update = "UPDATE `order` SET `status` = 2 WHERE `id` = '$order_id'";
                            $conn->query($sql_update);
                            $conn->close();
                        }


                        if (isset($_SESSION['contentcart'])) {
                            unset($_SESSION['contentcart']);
                        }
                        ?>

                        <div class="mb-4">
                            <i class="fa-solid fa-circle-check text-success" style="font-size: 80px;"></i>
                        </div>
                        <h2 class="text-success fw-bold mb-3">THANH TOÁN THÀNH CÔNG!</h2>
                        <p class="fs-5">Cảm ơn bạn đã mua sắm. Đơn hàng <strong>#<?= $order_id ?></strong> đã được thanh toán qua VNPAY.</p>
                        <p class="text-muted fs-5">Số tiền đã giao dịch: <strong class="text-danger"><?= number_format($amount, 0, ',', '.') ?> VNĐ</strong></p>


                    <?php else: ?>
                        <div class="mb-4">
                            <i class="fa-solid fa-circle-xmark text-danger" style="font-size: 80px;"></i>
                        </div>
                        <h2 class="text-danger fw-bold mb-3">GIAO DỊCH KHÔNG THÀNH CÔNG</h2>
                        <p class="fs-5">Đơn hàng của bạn chưa được thanh toán hoặc bạn đã nhấn hủy giao dịch trên hệ thống ngân hàng.</p>
                        <p>Giỏ hàng của bạn vẫn được giữ nguyên để bạn có thể thanh toán lại.</p>
                    <?php endif; ?>

                <?php else: ?>
                    <h2 class="text-danger fw-bold mb-3">⚠️ LỖI BẢO MẬT!</h2>
                    <p>Chữ ký dữ liệu không hợp lệ. Giao dịch bị từ chối.</p>
                <?php endif; ?>

                <div class="mt-5">
                    <a href="index.php" class="btn btn-main px-4 py-2 fs-5">Tiếp tục mua sắm</a>
                    <?php if ($_GET['vnp_ResponseCode'] != '00'): ?>
                        <a href="index.php?opt=cart" class="btn btn-secondary px-4 py-2 fs-5 ms-2">Về lại Giỏ hàng</a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</section>

<?php require_once "views/sites/footer.php"; ?>