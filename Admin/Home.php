<?php require '../dbConfig/config.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  </head>
  <body>
    <?php require '../Common/AdminHeader.php'; ?>

      <div class="container">
        <h3>Users List</h3>
        <ol>
          <?php
          $query = "SELECT * FROM users";
          $query_solution = mysqli_query($con, $query);
          if($query_solution){
            while ($rows = mysqli_fetch_array($query_solution)) {
              ?>
          <li><a href="ViewDetails.php?name=<?php echo $rows['Username'] ?>" type="submit" name="id" value="<?php echo $rows['Username'] ?>"><?php echo $rows['Username'] ?></a></li>
        <?php
        }
      }
       ?>
        </ol>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>
