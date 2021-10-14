
<!-- Create Section -->

<?php
$conn = mysqli_connect('localhost', 'root', '', 'stdpro');

if (isset($_POST['btn'])) {
  $stdname = $_POST['stdname'];
  $stdreg = $_POST['stdreg'];

  if (!empty($stdname) && !empty($stdreg)) {
    $query = "INSERT INTO student(stdname, stdreg) VALUE ('$stdname', $stdreg)";
    $createquery = mysqli_query($conn, $query);

    if ($createquery) {
      echo 'Your Data Submited';
    }
  } else {
    echo "Filed Should not be Empty";
  }
}

?>

<!-- Delete Section -->
<?php

if (isset($_GET['delete'])) {

  $stdid = $_GET['delete'];
  $query = "DELETE FROM student WHERE id={$stdid}";
  $deletequery = mysqli_query($conn, $query);

  if ($deletequery) {
    echo 'Data Removed Successfully!';
  }
}


?>