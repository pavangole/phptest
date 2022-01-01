<?php
include "db_connect.php";
?>
<?php

    $showAlert=false;
    $showError=false;
    $exists=false;
    // echo "Hello ";
    // foreach ($_SERVER as $value) {
    //     echo "<br>".$value;
    // }
// Check whether data come or not
    if($_SERVER["REQUEST_METHOD"]=='POST') {

        // Store the provide data by user
        $email=$_POST["Email"];
        $password=$_POST["password"];
        $cpassword=$_POST["cpassword"];

        // Check user
        $sql="Select * FROM user where Email='$email'";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
    if($num==0){
          if(($password==$cpassword)) {
              $sql="INSERT INTO user VALUES ('$email', '$password')";
              $result = mysqli_query($conn,$sql);
              if($result) {
                  $showAlert=true;
            }
          }
          else{
              $showError="Password do not match";
          }
    }
    if($num>0){
        $exists="User Already Exist";
    }

    mysqli_close($conn);

    }

?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>SIGN UP</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

</head>
<style>
.board{
dispaly:block;
margin-top:120px;
margin-left:auto;
margin-right:auto;
  width:50%;
}
.god{
  width:50%;
}
</style>
<body>

<?php
    include "nav.php";
?>

  <?php
  if($exists){
    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
 <strong>Soory </strong>'. $exists.'
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  if($showAlert){
      header("Location: login.php");
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
 <strong>Thank you </strong> Your respone is submitted you can log in
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  if($showError){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
 <strong>  '. $showError.'</strong>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  ?>


<div class="board shadow">
  <div class="container mt-10">
    <h3 class="text-center ">Sign UP to PLUSgetWAY</h3>
    <form action="signup.php" method="post">
    <div class="god">
  <div class="form-group mb-3">
    <label for="Email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="Email" name="Email" aria-describedby="emailHelp" autocomplete="off" >
  </div>

  <div class="form-group mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <div class="form-group mb-3">
    <label for="cpassword" class="form-label">Conform Password</label>
    <input type="password" name="cpassword" class="form-control" id="cpassword">
  </div>

  <button  type="submit" class="btn btn-success mb-3">Sign UP</button>
  </div>
</form>
  </div>
</div>


   <!-- Optional JavaScript; cfhoose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>