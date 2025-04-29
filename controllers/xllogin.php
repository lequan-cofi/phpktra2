<?php
session_start(); 
require '2Fa/vendor/autoload.php'; // Autoload Composer
require '../models/connect.php'; // Kết nối database

use PragmaRX\Google2FA\Google2FA;

// Khởi tạo biến lần đầu
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}
if (!isset($_SESSION['last_login_attempt'])) {
    $_SESSION['last_login_attempt'] = time();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Nếu vượt quá 5 lần trong 5 phút thì chặn
    if ($_SESSION['login_attempts'] >= 5 && (time() - $_SESSION['last_login_attempt']) < 300) {
        echo "Bạn đã đăng nhập sai quá nhiều lần. Vui lòng thử lại sau 5 phút.";
        exit();
    }

    $user = trim($_POST["user"]);
    $pass = trim($_POST["pass"]);
    $otp  = trim($_POST["otp"]); // lấy thêm mã 2FA người dùng nhập

    $stmt = $conn->prepare("SELECT * FROM account WHERE usename = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // So sánh password đã mã hóa
        if ($pass == $row['password'])  {

            // Kiểm tra mã OTP 2FA
            $google2fa = new Google2FA();
            $secretKey = $row['google2fa_secret'];

            if ($google2fa->verifyKey($secretKey, $otp,2)) {
                // Đăng nhập thành công
                $_SESSION['user'] = [
                    'usename' => $row['usename'],
                    'google2fa_secret' => $row['google2fa_secret'] // nếu cần
                ];
               

                // Reset số lần đăng nhập sai
                $_SESSION['login_attempts'] = 0;
                $_SESSION['last_login_attempt'] = time();

                echo "Đăng nhập thành công!";
                header("Location: ../index.php"); // chuyển đến trang chính
                exit();
            } else {
                // Sai mã 2FA
                $_SESSION['login_attempts']++;
                $_SESSION['last_login_attempt'] = time();
                echo "Mã xác thực 2FA không đúng!";
                // Debug thông tin trước khi kiểm tra 2FA
                echo "<pre>";
                echo "Secret Key trong DB: " . htmlspecialchars($secretKey) . "\n";
                echo "Mã OTP người dùng nhập: " . htmlspecialchars($otp) . "\n";

                $google2fa = new Google2FA();
                $otp_chinh_xac = $google2fa->getCurrentOtp($secretKey);
                echo "Mã OTP chính xác hiện tại: " . htmlspecialchars($otp_chinh_xac) . "\n";
                echo "</pre>";

            }

        } else {
            // Sai mật khẩu
            $_SESSION['login_attempts']++;
            $_SESSION['last_login_attempt'] = time();
            echo "Mật khẩu không đúng!";
            echo "Số lần nhập sai: " . $_SESSION['login_attempts'];
        }
    } else {
        // Tài khoản không tồn tại
        $_SESSION['login_attempts']++;
        $_SESSION['last_login_attempt'] = time();
        echo "Tài khoản không tồn tại!";
        echo "Số lần nhập sai: " . $_SESSION['login_attempts'];
    }

    $stmt->close();
}
?>
