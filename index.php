<?php require 'dbConfig/config.php';
session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  </head>
  <body>
    <?php require 'Common/Header.php'; ?>
      <div class="container border my-3">
        <form action="index.php" method="post">
        <center><h2>Login</h2>
        <div class="col-md-6 mb-3">
          <label for="" class="form-label">Enter Username</label>
          <input type="text" class="form-control col-md-4" name="Username" value="">
        </div>
        <div class="col-md-6 mb-3">
          <label for="" class="form-label">Enter Password</label>
          <input type="password" class="form-control col-md-4" name="Password" value="">
        </div>
        <button type="submit" class="btn btn-outline-primary mb-3" name="Login">Login</button>
        </form>
        </center>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>
<?php
  if (isset($_POST['Login'])) {
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    if ($username == "Admin" && $password == "Admin@123#") {
      echo "<script>window.location.href = 'Admin/Home.php'</script>";
    }
    else {
      $query = "select * from users where Username = '$username' AND password = '$password'";
      $query_solution = mysqli_query($con, $query);
      $query_solutions = mysqli_query($con, $query);
      if (mysqli_fetch_array($query_solution) > 0) {
        $_SESSION['username'] = $username;
        while ($row = mysqli_fetch_array($query_solution)) {
          $_SESSION['user_id'] = $row['ID'];
        }
        echo "<script>window.location.href = 'User/Home.php'</script>";
      }
      else {
        echo "<script>alert('Check Username and password !')</script>";
      }
    }
  }
 ?>
