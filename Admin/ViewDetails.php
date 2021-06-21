<?php require '../dbConfig/config.php';
$uname = $_GET['name'];
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
    <?php require '../Common/AdminHeader.php'; ?>

    <div class="container">
      <h4>User : <?php echo $_GET['name'] ?></h4>
      <div class="container-fluid mb-3">
        <div class="row">
          <form class="" action="ViewDetails.php" method="GET">
          <div class="col-auto">
            <input type="hidden" name="name" value="<?php echo $_GET['name'] ?>">
            <label for="" class="form-label">Start Date</label>
            <input type="date" name="startdate" value="">
          </div>
          <div class="col-auto">
            <label for="" class="form-label">End Date</label>
            <input type="date" name="enddate" value="">
          </div>
          <div class="col-auto">
            <input type="submit" class="btn btn-sm btn-primary" name="search" value="Search">
          </div>
          </form>
        </div>
      </div>
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
          if (isset($_GET['startdate'])) {
            $uname = $_GET['name'];
            $startdate = $_GET['startdate'];
            $enddate = $_GET['enddate'];
            $query = "SELECT * from attendence where Username = '$uname' AND Date BETWEEN '$startdate' AND '$enddate' ORDER BY ID DESC ";
          }
          else {
            $uname = $_GET['name'];
            $query = "SELECT * from attendence where Username = '$uname' ORDER BY ID DESC";
          }
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
if (isset($_POST['search'])) {
  $startdate = $_GET['startdate'];
  $enddate = $_GET['enddate'];
  $user = $_GET['name'];
  header("Location: ViewDetails.php?name=$user&sdate=$startdate&edate=$enddate");
  echo "<script>window.location.href = 'ViewDetails.php?name=$user&sdate=$startdate&edate=$enddate'</script>";
}

 ?>
