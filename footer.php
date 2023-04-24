<?php
// session_start();
include("koneksi.php");
if(!isset($_SESSION['admin_Username'])){
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/footer.css">
</head>
<body>
    <div class="footer">
        <p>©2023 <span>Tridharma Manado</span></p>
    </div>
    <style>
        .footer p {
            font-size : 15px;
        }
        span {
            font-weight: bold;
        }
    </style>
</body>
</html>