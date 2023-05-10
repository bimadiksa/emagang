<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verifikasi Email</title>
</head>

<body>
    <p>Silahkan klik link di bawah ini untuk melakukan verifikasi email:</p>
    <p><a href="<?= base_url('verify_email/' . $verification_code) ?>"><?= base_url('verify_email/' . $verification_code) ?></a></p>
</body>

</html>