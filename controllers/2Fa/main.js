$(function() {
    // 1. Load QR code and current OTP
    $.get('../controllers/2Fa/generate.php', function(data) { // Adjusted path to generate.php
        $('#qrcode').html(`
            <p>OTP: ${data.otp}</p>
            <img src="data:image/svg+xml;base64,${data.qr}" />
        `);
    }, 'json');

    // 2. Verify OTP
    $('#verify-form').on('submit', function(e) {
        e.preventDefault();

        var otp = $('#otp').val();
        if (!otp) {
            alert('Please input your OTP code!');
            return false;
        }

        $.ajax({
            url: '../controllers/2Fa/verify.php', // Adjusted path to verify.php
            method: 'POST',
            data: { otp: otp },
            dataType: 'json',
            success: function(data) {
                if (data.result) {
                    alert('✅ OTP verified successfully! OTP: ' + data.provided_otp);
                    window.location.href = '../views/login.php'; // Redirect to login.php
                } else {
                    alert('❌ OTP wrong! Please try again.');
                }
            }
        });
    });
});