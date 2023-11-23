<!-- app/Views/auth/verify_qr_code.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi QR Code</title>
</head>
<body>
    <h2>Verifikasi QR Code</h2>
    <form action="<?= site_url('TableAuth/verifyQRCode'); ?>" method="post">
        <label for="token">Masukkan Token QR Code:</label>
        <input type="text" name="token" required>
        <button type="submit">Verifikasi</button>
    </form>
</body>
</html>
