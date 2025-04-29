<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Authenticator with PHP - Genelify</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../controllers/2Fa/main.js"></script> <!-- Tách JS riêng -->
    <link rel="stylesheet" href="style.css"> <!-- Tách CSS riêng -->
    <style>
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding-left: 250px;
        } */
        h1 {
        font-size: 2.5em;
        color:rgb(21, 97, 130);
        font-weight: 700;
        margin: 0 0 1em;
        align-self: center;
        text-align: center;
        }
        .container {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        gap: 40px; /* khoảng cách giữa QR và form */
        margin-top: 40px;
        }
        #qrcode {
            background-color:rgb(253, 253, 253);
        }
        #qrcode p {
        font-size: 2em;
        color: #217093 ;   
        }
        #qrcode img {
        width: 500px; /* Kích thước QR code */
        height: 500px; /* Kích thước QR code */
        margin-left: 200px; /* Căn giữa QR code */
   
        }
        /* #qrcode p {
        font-size: 1.2em;
        color: #666; 
        } */
        /* Xóa căn giữa tuyệt đối của form nếu có */
        form {
        position: static;
        transform: none;
        margin: 0;
        }
        form button {
        margin-top: 50px;
        padding: 10px 30px;

        }

    </style>
</head>
<body>
    <h1>Google Authenticator</h1>
<div class="container">
<div id="qrcode" >
        <p>Loading QR Code...</p>
    </div>

  
    <form id="verify-form">
        <input type="text" id="otp" placeholder="Input OTP code">
        <button type="submit">Verify</button>
    </form>
</div>
    
</body>
</html>
