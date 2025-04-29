<?php
require '2Fa/vendor/autoload.php'; // Autoload Composer
require '../models/connect.php'; // Kết nối database


use PragmaRX\Google2FA\Google2FA;

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = htmlspecialchars(trim($_POST['user']));
    $pass = htmlspecialchars(trim($_POST['pass']));

    if (!empty($user) && !empty($pass)) {
     
   

        // Tạo secret key 2FA
        $google2fa = new Google2FA();
        $secretKey = $google2fa->generateSecretKey();
        // Kiểm tra tài khoản đã tồn tại chưa
        $checkStmt = $conn->prepare("SELECT id FROM account WHERE usename = ?");
        $checkStmt->bind_param("s", $user);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            echo "Tên đăng nhập đã tồn tại, vui lòng chọn tên khác!";
            $checkStmt->close();
            exit();
        }
        $checkStmt->close();
        // Thêm dữ liệu vào database
        $stmt = $conn->prepare("INSERT INTO account (usename, password, google2fa_secret) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sss", $user, $pass, $secretKey);

            if ($stmt->execute()) {
                // Lưu secret vào session để tạo QR code
                $_SESSION['user'] = [
                    'usename' => $user,
                    'google2fa_secret' => $secretKey
                ];

                // Chuyển sang trang quét QR 2FA
                header("Location: ../views/2fa.php");
                exit();
            } else {
                echo "Lỗi: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Lỗi: Không thể chuẩn bị truy vấn.";
        }
    } else {
        echo "Vui lòng nhập đầy đủ thông tin!";
    }
}
?>