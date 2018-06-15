
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
        <div class="form-group" style="text-align: center;">
            <input type="text" style="display:none" name="account"value="<?php echo $_GET['account']?>">
            <input type="password" name="new_pass" placeholder="Enter New password">
            <br>
            <input type="password" name="confirm_pass" placeholder="Confirm password">
            <br>
            <input type="submit" name="submit" value="submit">
        </div>
    </form>
</body>
</html>