<?php include('header.php'); ?>
<?php include('config.php'); ?>
    <h2>All Students</h2>
    <table class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
      </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM students";

$result = mysqli_query($conn, $query);

if(!$result){
    die("Query failed: " . mysqli_error($conn));
} else {
   while($row = mysqli_fetch_assoc($result)){
    ?>
          <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['fname']; ?></td>
      <td><?php echo $row['lname']; ?></td>
      <td><?php echo $row['age']; ?></td>
      </tr>

    <?php

   }
}
?>
    </tbody>
  </table>
  
  <?php include('footer.php'); ?>