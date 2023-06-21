<p>Hi,</p>
<p>Mohon klik link dibawah ini untuk bisa merubah password anda:</p>
<p><a href="<?= base_url('reset_password/' . $token) ?>"><?= base_url('reset_password/' . $token) ?></a></p>
<p>Jika anda tidak meminta untuk rubah password ABAIKAN INI. Hati-hati terhadap akun anda!</p>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Perbarui Password</title>
    <style>
        /* Gaya CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            height: 100vh;
        }

        .container {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }

        .container2 {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 10px;
        }

        .button {
            color: white;
            display: inline-block;
            background-color: #7227FE;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }

        /* .button:hover {
            background-color: grey;
            color: #7227FE;
        } */

        .icon {
            display: inline-block;
            margin-right: 10px;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Perbarui Password Akun E-Magang</h1>
        <p>Mohon klik link dibawah ini untuk bisa merubah password anda:</p>
        <a style="color: white;" href="<?= base_url('reset_password/' . $token) ?>" class="button" class="button"><strong>Perbarui Password</strong></a>
        <p style="color: red;">Jika kamu tidak merasa ingin merubah password akun E-Magang, anda bisa hapus email ini.</p>
        <p><a href="<?= base_url('/login_view') ?>">Login</a></p>
        <p>
            Anda dikirimkan email ini karena anda ingin merubah password akun E-Magang.
        </p>
        <p>© 2023 E-Magang.</p>
    </div>


</body>

</html>