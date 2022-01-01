<?php
// $result=0;
$showError=false;
session_start();
include "db_connect.php";
if(isset($_POST['submit'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  $sql="SELECT * FROM `admintable` WHERE username='$username' and password='$password'";
  $query=mysqli_query($con,$sql);

  $row = mysqli_num_rows($query);
    if($row==1){
      echo"login succesful";
      $_SESSION['username']=$username;
      header('location:index.php');
    }
    else{
      $showError="Soory ! You are not a admin";
      header('location:admin.php');
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>SERVICE MANAGEMENT AND MONITORING SOFTWARE</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
    
</head>
<style>
  .container{
dispaly:block;
margin-top:120px;
margin-left:auto;
margin-right:auto;
  width:50%;
  padding:2px;
}
.bor{
  width:50%;
padding-right:25px;
padding-left:25px;
}
</style>
<body>
  <?php
if($showError){
    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
 <strong>Soory </strong>'. $showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>';
   }
   ?>
  <div class="container shadow mb-5 ">
<h3 class="text-center mb-5 text-uppercase"> Admin Portal </h3>
<form action="admin.php" method="POST">
<div class="bor">
<div class=" mb-5 ">
    <label for="username" class="form-label">username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" autocomplete="off">
  </div>
  
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <button type="submit" class="btn btn-success mb-5" name="submit">Submit</button>
  </div>
</form>
               
           </div>

       </div>

    </div>
    </div>
    
</body>
</html>