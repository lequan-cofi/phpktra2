<?php
// generate.php

require '../2Fa/vendor/autoload.php'; // Autoload Composer

use PragmaRX\Google2FA\Google2FA;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Writer;

session_start();

// Kiểm tra đã có thông tin user trong session chưa
if (!isset($_SESSION['user']) || empty($_SESSION['user']['usename']) || empty($_SESSION['user']['google2fa_secret'])) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Không có thông tin user trong session']);
    exit();
}

// Lấy user info
$usename = $_SESSION['user']['usename'];
$secretKey = $_SESSION['user']['google2fa_secret'];

// App name (tên app hiện trong Google Authenticator)
$app_name = 'MyApp-2FA';

// Khởi tạo đối tượng Google2FA
$googleOTP = new Google2FA();

// Generate QR Code URL
$qrCodeUrl = $googleOTP->getQRCodeUrl(
    $app_name,
    $usename, // dùng username thay email
    $secretKey
);

// Tạo QR code dạng SVG base64
$writer = new Writer(
    new ImageRenderer(
        new RendererStyle(250),
        new SvgImageBackEnd()
    )
);

$encoded_qr_data = base64_encode($writer->writeString($qrCodeUrl));

// Lấy mã OTP hiện tại
$current_otp = $googleOTP->getCurrentOtp($secretKey);

// Trả về JSON
header('Content-Type: application/json');
echo json_encode([
    'qr' => $encoded_qr_data,
    'otp' => $current_otp
]);
?>
