<!-- app/Views/auth/generate_qr_code.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate QR Code</title>
</head>
<body>
    <h2>QR Code untuk Login</h2>
    <img src="data:image/png;base64,<?= base64_encode($qrCode); ?>" alt="QR Code">
</body>
</html>
