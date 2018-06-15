
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <form action="validate_reset_password.php" method="POST">
        <input type="text" style="display:none" name="account"value="<?php echo $_GET['account']?>">
        <input type="password" name="new_pass" placeholder="Enter New password">
        <input type="password" name="confirm_pass" placeholder="Confirm password">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>