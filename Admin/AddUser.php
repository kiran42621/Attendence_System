<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  </head>
  <body>
    <?php require '../Common/AdminHeader.php'; ?>
    <div class="container border my-3">
      <form>
      <center><h2>Add User</h2>
      <div class="col-md-6 mb-3">
        <label for="" class="form-label">Enter Username</label>
        <input type="text" class="form-control col-md-4" name="Username" value="">
      </div>
      <div class="col-md-6 mb-3">
        <label for="" class="form-label">Enter Password</label>
        <input type="password" class="form-control col-md-4" name="Username" value="">
      </div>
      <button type="submit" class="btn btn-outline-primary mb-3" name="button">Add</button>
      </form>
      </center>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>
