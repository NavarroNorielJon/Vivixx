<!DOCTYPE html>
<html>
<body>
  <head>
    <title>
    </title>
  </head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
  <script src="../script/jquery.min.js"></script>
  <script src="../script/bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="../script/ajax.js"></script>
  <script type="text/javascript" src="../script/popper.min.js"></script>

    <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle"
            type="button" id="dropdownMenu1" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">Sort by:
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
      <form action="account_status.php" class="dropdown-item" method="POST">
        <button type="submit" class="dropdown-item" name="asc">First Name Ascending</button>
      </form>
      <form action="account_status.php" class="dropdown-item" method="POST">
        <button type="submit" class="dropdown-item" name="desc">First Name Descending</button>
      </form>
      <form action="account_status.php" class="dropdown-item" method="POST">
        <button type="submit" class="dropdown-item" name="last_asc">Last Name Ascending</button>
      </form>
      <form action="account_status.php" class="dropdown-item" method="POST">
        <button type="submit" class="dropdown-item" name="last_desc">Last Name Descending</button>
      </form>
      <form action="account_status.php" class="dropdown-item" method="POST">
        <button type="submit" class="dropdown-item" name="status_asc">Status(Enabled First)</button>
      </form>
      <form action="account_status.php" class="dropdown-item" method="POST">
        <button type="submit" class="dropdown-item" name="status_desc">Status(Disabled First)</button>
      </form>
    </div>
    </div>
</body>
<html>
