<?php session_start();
require '../dbConfig/config.php';

date_default_timezone_set("Asia/Calcutta");
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
        <tbody>
          <?php
          $query = "SELECT * from attendence where Username = '$uname'";
          $query_solution = mysqli_query($con, $query);
          if ($query_solution) {
            while ($rows = mysqli_fetch_array($query_solution)) {
              ?>
          <tr>
            <td></td>
            <td><?php echo $rows['Date'] ?></td>
            <td><?php echo $rows['Check-In'] ?></td>
            <td><?php echo $rows['Checkout'] ?></td>
          </tr>
          <?php
        }
      }
       ?>
        </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>
<?php
  if (isset($_POST['CheckIn'])) {
    $username = $_SESSION['username'];
    $userID = $_SESSION['user_id'];
    date_default_timezone_set("Asia/Calcutta");
    $date = date("Y/m/d");
    $time = date("h:i:sa");
    $query = "UPDATE users SET Status = 'Check-In' where Username = '$username'";
    $query_solution = mysqli_query($con, $query);
    $query2 = "insert into attendence values ('','$userID','$username','$date','$time','')";
    $query_solution2 = mysqli_query($con, $query2);
    if ($query_solution) {
      if ($query_solution2) {
        echo "<script>window.location.href = 'Home.php'</script>";
      }
    }
  }
  if (isset($_POST['CheckOut'])) {
    $username = $_SESSION['username'];
    $userID = $_SESSION['user_id'];
    date_default_timezone_set("Asia/Calcutta");
    $date = date("Y/m/d");
    $time = date("h:i:sa");
    $query = "UPDATE users SET Status = 'Check-Out' where Username = '$username'";
    $query_solution = mysqli_query($con, $query);
    $query2 = "UPDATE attendence SET Checkout = '$time' where Username = '$username' and Date = '$date' and Checkout = '00.00.00'";
    $query_solution2 = mysqli_query($con, $query2);
    if ($query_solution) {
      if ($query_solution2) {
        echo "<script>window.location.href = 'Home.php'</script>";
      }
    }
  }
  
 ?>
