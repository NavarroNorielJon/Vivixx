

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../style/style.css">
</head>
<body style="text-align:center;">
    <form action="validate_reset_password.php" method="POST">
        <input name="account" type="text" style="display: none;" value="<?php echo $_GET['account'];?>">
        <input type="text" name="new_pass" placeholder="Enter New Password">
        <br>
        <input type="text" name="confirm_pass" placeholder="Confirm Password">
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>