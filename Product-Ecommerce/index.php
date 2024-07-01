<?php
session_start();
require "conf.php";
if(isset($_POST["submit"]))
{
$nm=$_POST['name'];
$em=$_POST['email'];
$ph=$_POST['phone'];
$pd=$_POST['password'];
$q = "SELECT * FROM book WHERE email = '$em'";
$result = mysqli_query($con, $q);

if(mysqli_num_rows($result) > 0) 
{
  echo "<script>alert('Email already registered! Please use a different email.');</script>";
} 
else 
{
$q="insert into book(name,email,phone,password)values('$nm','$em','$ph','$pd')";
$result=mysqli_query($con,$q);
if($result)
{
  echo "<script>alert('SignUp SuccessFully');</script>";
  header("Location: product.php");
}
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommarce Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <link rel="stylesheet" href="index.css"></link>
  <body>
   <div class="container">
    <div class="img">
    </div>
    <div class="demo">
    <form action="" method="post">
    <h1>SignUp</h1><br>
    <label class="form-label">Name</label>
    <input type="text" name="name" id="id1" class="form-control" placeholder="enter name here.."required>
    </br> 
    <label class="form-label">Email</label>
    <input type="email" name="email" id="id2"class="form-control"placeholder="enter email here.."required>
     </br> 
     <label class="form-label">Phone</label>
     <input type="number" name="phone" id="id3"class="form-control" placeholder="enter phone here.."required>
      </br>  
      <label class="form-label">Password</label>
      <input type="password" name="password" id="id4"class="form-control"placeholder="enter password here.."required>
      <input type="checkbox" onclick="myFunction()">&nbsp; <label>Show Password</label>
      <br><br>
       <input type="submit" value="REGISTER" name="submit">
      <br>
      <label2>Already have an account?</label2><a href="login.php">&nbsp;Login</a>
   </div>
   </div>
</form>
    <script>
      function myFunction() {
          var x = document.getElementById("id4");
            if (x.type === "password") {
               x.type = "text";
                 } else {
                 x.type = "password";
                 }
                }
    </script>
  </body>
</html>