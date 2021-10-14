<?php

include('connect.inc.php');

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>PHP-CRUD</title>
</head>

<body>

  <div class="container shadow m-5 p-3">
    <form class="d-flex justify-content-around" action="" method="POST">
      <input class="form-control" type="text" name="stdname" placeholder="Enter Your Name">
      <input class="form-control" type="number" name="stdreg" placeholder="Enter Your Reg.">
      <input class="btn btn-success" type="submit" value="send" name="btn">
    </form>
  </div>

  <!-- Update Section -->

  <div class="container m-5 p-3">
    <form class="d-flex justify-content-around" action="" method="POST">
      <?php

      if (isset($_GET['update'])) {

        $stdid = $_GET['update'];
        $query = "SELECT * FROM student WHERE id={$stdid}";
        $getdata = mysqli_query($conn, $query);

        while ($rx = mysqli_fetch_assoc($getdata)) {
          $stdid = $rx['id'];
          $stdname = $rx['stdname'];
          $stdreg = $rx['stdreg'];

      ?>
          <input class="form-control" type="text" name="stdname" value="<?php echo $stdname; ?>">
          <input class="form-control" type="number" name="stdreg" value="<?php echo $stdreg; ?>">
          <input class="btn btn-warning" type="submit" value="Update" name="update_btn">
      <?php }
      } ?>

      <?php

      if (isset($_POST['update_btn'])) {
        $stdname = $_POST['stdname'];
        $stdreg = $_POST['stdreg'];

        if (!empty($stdname) && !empty($stdreg)) {
          $query = "UPDATE student SET stdname='$stdname', stdreg=$stdreg WHERE id=$stdid";
          $updatequery = mysqli_query($conn, $query);

          if ($updatequery) {
            echo "Data Updated";
          } else {
            echo "Field Should not be Empty!";
          }
        }
      }

      ?>

    </form>
  </div>
  <div class="container">
    <table class="table table-bordered">
      <tr>
        <th>STD ID</th>
        <th>STD NAME</th>
        <th>Reg</th>
        <th></th>
        <th></th>
      </tr>

      <!-- Read Section -->

      <?php

      $query = "SELECT * FROM student";
      $readquery = mysqli_query($conn, $query);
      if ($readquery->num_rows > 0) {
        while ($rd = mysqli_fetch_assoc($readquery)) {

          $stdid = $rd['id'];
          $stdname = $rd['stdname'];
          $stdreg = $rd['stdreg'];

      ?>

          <tr>
            <td><?php echo $stdid; ?></td>
            <td><?php echo $stdname; ?></td>
            <td><?php echo $stdreg; ?></td>
            <td><a class="btn btn-info" href="index.php?update=<?php echo $stdid; ?>">Update</a></td>
            <td><a class="btn btn-danger" href="index.php?delete=<?php echo $stdid; ?>">Delete</a></td>

          </tr>
      <?php }
      } else {

        echo "No Data to Read!";
      } ?>

    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>