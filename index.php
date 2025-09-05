<?php include('header.php'); ?>
<?php include('config.php'); ?>

<div class="box1">
    <h2>All Students</h2>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Student
</button>

</div>
    <table class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
        <th>Update</th>
        <th>Delete</th>
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
      <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
      <td><a href="delete.php?id=<?php echo $row['id']; ?>"  class="btn btn-danger">Delete</a></td>
      </tr>

    <?php

   }
}
?>
    </tbody>
  </table>


<?php
if(isset($_GET['message'])){
    echo '<div class="alert alert-success" role="alert">'
        . htmlspecialchars($_GET['message']) .
        '</div>';
}

if(isset($_GET['insert_msg'])){
    echo '<div class="alert alert-success" role="alert">'
        . htmlspecialchars($_GET['insert_msg']) .
        '</div>';
}
?>

<!-- Modal -->
 <form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Students</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="fname"> First Name</label>
            <input type="text" name="fname" class="form-control">
          </div>
             <div class="form-group">
            <label for="lname"> Last Name</label>
            <input type="text" name="lname" class="form-control">
          </div>
             <div class="form-group">
            <label for="age"> Age</label>
            <input type="text" name="age" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_student" value="Add">
      </div>
    </div>
  </div>
</div>
</form>
  
  <?php include('footer.php'); ?>