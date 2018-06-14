<?php
    include '../admin/include.php';
    include '../admin/header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../style/style.css">
    <script src="main.js"></script>
</head>
<body style="text-align:center;">
    <form action="validate_reset_password.php" method="POST">
        <input type="text" name="pass" placeholder="Enter New Password">
        <br>
        <input type="text" name="cpass" placeholder="Confirm Password">
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>