<?php include('header.php'); ?>
<?php include('config.php'); ?>

<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];

  $query = "SELECT * FROM `students` WHERE `id` = $id";
  $result = mysqli_query($conn, $query);

  if(!$result){
      die("Query failed: " . mysqli_error($conn));
  } else {
      $row = mysqli_fetch_assoc($result);
  }
}

if(isset($_POST['update_student'])){

  $id = $_GET['id'];

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $age = $_POST['age'];

  $query = "UPDATE `students` 
            SET `fname` = '$fname', `lname` = '$lname', `age` = '$age' 
            WHERE `id` = $id";

  $result = mysqli_query($conn, $query);

  if(!$result){
      die("Query failed: " . mysqli_error($conn));
  } else {
      header('location:index.php?update_msg=Record updated successfully!');
      exit;
  }
}
?>

<form action="update.php?id=<?php echo $id; ?>" method="post">
  <div class="form-group">
    <label for="fname"> First Name</label>
    <input type="text" name="fname" class="form-control" 
           value ="<?php echo $row['fname'] ?>" required>
  </div>

  <div class="form-group">
    <label for="lname"> Last Name</label>
    <input type="text" name="lname" class="form-control" 
           value ="<?php echo $row['lname'] ?>" required>
  </div>

  <div class="form-group">
    <label for="age"> Age</label>
    <input type="text" name="age" class="form-control" 
           value ="<?php echo $row['age'] ?>" required>
  </div>

  <div class="form-group mt-3">
    <input type="submit" class="btn btn-success" 
           name="update_student" value="Update">
  </div>
</form>

<?php include('footer.php'); ?>
