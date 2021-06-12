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
        <h3><strong>Welcome Name</strong></h3>
      </div>
      <div class="row p-2 bd-highlight">
        <h4>Date : <?php echo date("l jS \of F Y h:i:s A"); ?></h4>
      </div>
    </div>
    <div class="container">
      <button type="button" class="btn btn-success" name="button">Check In</button>
      <button type="button" class="btn btn-danger" name="button">Check Out</button>
    </div>
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
