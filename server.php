<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Welcome</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

  <style>a {
           color: white;
         }
  </style>

</head>
<body>
    <div class="main-div">
<table class="table">
  <thead class="thead-dark bg-dark text-white">
    <tr>
      <th scope="col">id</th>
      <th scope="col ">Server Name</th>
      <th scope="col ">Server Password</th>
      <th scope="col ">Connect</th>
      <th scope="col ">Stop</th>
    </tr>
  </thead>
  <tbody>

  
  <?php
session_start();
$email=$_SESSION['email'];
//$username = "";
//$email = "";
//$_SESSION['success'] = "";

$db = mysqli_connect('localhost', 'soham', 'soham', 'website');
if(!$db){
  echo "You are not connected to database";
}

$selectquery = "select * from server WHERE Email='$email';";
$query = mysqli_query($db,$selectquery);
$nums=mysqli_num_rows($query);

while($res=mysqli_fetch_array($query)){
 $id=$res['ID'];
?>
   <tr>
       <td><?php echo $res['ID'];?></td>
       <td><?php echo $res['Name'];?></td>
       <td><?php echo $res['Password'];?></td>
       <td><button type="button" class="btn btn-success"><a href="https://20.198.1.249:8001">Connect</a></button></td>
       <td><button type="button" class="btn btn-danger"><a href=<?php echo "stop.php?b=$id" ?>>Stop</a></button></td>

   </tr>
   <?php
}
?>
  </tbody>
</table>
</div>
 <!-- Optional JavaScript; choose one of the two! -->

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