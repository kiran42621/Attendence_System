<?php session_start();
require '../dbConfig/config.php';

date_default_timezone_set("Asia/Calcutta");
$uname = $_SESSION['username'];
$uid = $_SESSION['user_id'];
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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
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
    <div class="container mt-2">
      <table class="table table-responsive table-stripped table-hover table-sm" id="myTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Check-In</th>
            <th scope="col">Check-Out</th>
            <th scope="col">Time</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * from attendence where Username = '$uname' ORDER BY ID DESC";
          $query_solution = mysqli_query($con, $query);
          if ($query_solution) {
            while ($rows = mysqli_fetch_array($query_solution)) {
              ?>
          <tr>
            <td></td>
            <td><?php echo $rows['Date'] ?></td>
            <td><?php echo $rows['Check-In'] ?></td>
            <td><?php echo $rows['Checkout'] ?></td>
            <td><?php echo $rows['TimeDifference'] ?></td>
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
<script>
$(document).ready( function () {
  $('#myTable').DataTable();
} );
</script>
<?php
  if (isset($_POST['CheckIn'])) {
    $username = $_SESSION['username'];
    $userID = $uid;
    date_default_timezone_set("Asia/Calcutta");
    $date = date("Y/m/d");
    $time = date("H:i:sa");
    $query = "UPDATE users SET Status = 'Check-In' where Username = '$username'";
    $query_solution = mysqli_query($con, $query);
    $query2 = "insert into attendence values ('','$userID','$username','$date','$time','','')";
    $query_solution2 = mysqli_query($con, $query2);
    if ($query_solution) {
      if ($query_solution2) {
        echo "<script>window.location.href = 'Home.php'</script>";
      }
    }
  }
  if (isset($_POST['CheckOut'])) {
    $username = $_SESSION['username'];
    date_default_timezone_set("Asia/Calcutta");
    $date = date("Y/m/d");
    // $time1 = strtotime("08:32:21");
    $time = date("H:i:s");
    $querys = "SELECT * FROM attendence where Username = '$username' and Checkout = '00.00.00'";
    $querys_solution = mysqli_query($con, $querys);
    if ($querys_solution) {
      while ($row = mysqli_fetch_array($querys_solution)) {
        $firsttime = $row['Check-In'];
        $CheckInDate = $row['Date'];
      }
    }
    else {
      echo "<script>alert('You have not logged out yesterday')</script>";
    }
    $time1 = strtotime($CheckInDate." ".$firsttime);
    $time2 = strtotime(date("Y/m/d")." ".$time);
    $timediff = abs($time1-$time2);
    $Hours = floor($timediff/(60*60));
    $minutes = floor(($timediff/(60))%60);
    $timeDifference = $Hours.":".$minutes;
    $query = "UPDATE users SET Status = 'Check-Out' where Username = '$username'";
    $query_solution = mysqli_query($con, $query);
    $query2 = "UPDATE attendence SET Checkout = '$time' , TimeDifference = '$timeDifference' where Username = '$username' and Checkout = '00.00.00'";
    $query_solution2 = mysqli_query($con, $query2);
    if ($query_solution) {
      if ($query_solution2) {
        echo "<script>window.location.href = 'Home.php'</script>";
      }
    }
  }
 ?>
