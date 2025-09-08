<?php
include 'config.php';

if(isset($_POST['add_student'])){
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $age = $_POST['age'];


  if($fname == "" || empty($fname)){
    header('location:index.php?message=You need to fill your first name');
  }

  else {
    $query = "insert into  `students` (`fname`, `lname`, `age`) values ('$fname', '$lname', '$age')";

    $result = mysqli_query($conn,$query);
    if(!$result){
      die("Query Failed".mysqli_error($conn));
    }
    else {
      header('location:index.php?insert_msg=Record added successfully!');
      exit;
    }
  }

}
?>