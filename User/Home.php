<?php session_start();
require '../dbConfig/config.php';

$uname = $_SESSION['username'];
$query = "SELECT * FROM users where Username = '$uname'";
$query_solution = mysqli_query($con, $query);
if($query_solution){
  while ($rows = mysqli_fetch_array($query_solution)) {
    $status = $rows['Status'];
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  </head>
  <body>
    <?php require '../Common/UserHeader.php'; ?>
    <div class="container-fluid d-flex align-items-end flex-column bd-highlight mb-3">
      <div class="row p-2 bd-highlight">
        <h3><strong>Welcome <?php echo $_SESSION['username'] ?></strong></h3>
      </div>
      <div class="row p-2 bd-highlight">
        <h4>Date : <?php echo date("l jS \of F Y h:i:s A"); ?></h4>
      </div>
    </div>
    <form class="" action="Home.php" method="post">
    <?php if ($status == 'Check-Out') {?>
    <div class="container">
      <input type="submit" class="btn btn-success" name="CheckIn" value="Check In">
      <!-- <button type="submit" class="btn btn-success" name="CheckIn">Check In</button> -->
    </div>
  <?php }
  else {
    ?>
    <div class="container">
      <input type="submit" class="btn btn-danger" name="CheckOut" value="Check Out">
      <!-- <button type="submit" class="btn btn-danger" name="CheckOut">Check Out</button> -->
    </div>
  <?php } ?>
  </form>
    <div class="container">
      <table class="table table-responsive table-stripped table-hover table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Check-In</th>
            <th scope="col">Check-Out</th>
          </tr>
        </thead>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>
<?php
  if (isset($_POST['CheckIn'])) {
    $username = $_SESSION['username'];
    $query = "UPDATE users SET Status = 'Check-In' where Username = '$username'";
    $query_solution = mysqli_query($con, $query);
    if ($query_solution) {
      echo "<script>window.location.href = 'Home.php'</script>";
      echo "<script>alert'CheckIn'</script>";
    }
  }
  if (isset($_POST['CheckOut'])) {
    $username = $_SESSION['username'];
    $query = "UPDATE users SET Status = 'Check-Out' where Username = '$username'";
    $query_solution = mysqli_query($con, $query);
    if ($query_solution) {
      echo "<script>window.location.href = 'Home.php'</script>";
      echo "<script>alert'CheckOut'</script>";
    }
  }
 ?>
