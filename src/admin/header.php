<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
  <script src="../script/jquery.min.js"></script>
  <script src="../script/bootstrap/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-light" style="background-color:#005959">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php" style="color:white">VIVIXX</a>
    </div>
    <ul class="nav navbar">
      <li class="nav-item"><a class="nav-link" href="index.php" style="color:white">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="account_status.php" style="color:white">Accounts</a></li>
      <li class="nav-item"><a class="nav-link" href="user_information.php" style="color:white">User</a></li>
      <li class="nav-item"><a class="nav-link" href="logout.php" style="color:#fac213">Logout</a></li>
    </ul>
  </div>
  <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle"
          type="button" id="dropdownMenu1" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
    Sort by:
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <form action="sorting.php" class="dropdown-item" method="POST">
      <button type="submit" class="dropdown-item" name="fname_asc">First Name Ascending</button>
    </form>
    <a class="dropdown-item" href="#!">Another action</a>
  </div>
</div>
</nav>
</body>
</html>
