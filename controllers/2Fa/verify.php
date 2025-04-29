<?php

// Implement Google Authenticator with PHP (Two Factor Auth) - Genelify.com

require 'vendor/autoload.php';

use PragmaRX\Google2FA\Google2FA;

// Start Session
if(!session_id())
{
    session_start();
}

// Validate incoming request
if(empty($_POST['otp']) || empty($_SESSION['user']['google2fa_secret'])) {
    die(json_encode(['result' => false]));
}

// Initialize
$googleOTP = new Google2FA();

// Retrieve One Time Password from payload
$otp = $_POST['otp'];

// Verify provided OTP
$isValid = $googleOTP->verifyKey($_SESSION['user']['google2fa_secret'], $otp);

// Generate and print JSON response
die(json_encode([
    'provided_otp' => $otp, 
    'result' => $isValid
])); 
?>