<?php
session_start();
require 'conf.php'; 

if(isset($_POST['submit'])) {
    $em = $_POST['email'];
    $pd = $_POST['password'];
    $em = mysqli_real_escape_string($con, $em);
    $pd = mysqli_real_escape_string($con, $pd);
    $q ="SELECT * FROM book WHERE email='$em' AND password='$pd'";
    $result = mysqli_query($con, $q);
    
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); 
        if($pd == $row["password"]) {
            $_SESSION["id"] = $row["id"];
            echo "<script>alert('Login Successfully');</script>";
            header("Location: product.php");
            exit;
        } else {
            echo "<script>alert('Incorrect email or password');</script>";
        }
    } else {
        echo "<script>alert('User Not Found');</script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommarce Product</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
</head>
<style>
input[type=password]
{
    margin-left: 30px;
    border: 2px solid rgb(207, 19, 66);
    border-radius: 4px;
    width:200px;
}
    </style>
<body>
    <div class="container">
        <div class="img">
        </div>
        <div class="demo">
            <form action="" method="post">
                <h2 style="margin-left: 50px; color:rgb(206, 12, 44);font-size: 30px;font-style: bold;">SignIn</h2><br>
                <label class="form-label">Email</label>
                <input type="email" name="email" id="id1" class="form-control" placeholder="enter email here.." required>
                <br> 
                <label class="form-label">Password</label>
                <input type="password" name="password" id="id2" class="form-control" placeholder="enter password here.." required>
                <input type="checkbox" onclick="myFunction()">&nbsp; <label>Show Password</label>
                <br><br>
                <input type="submit" value="LOGIN" name="submit">
                <br>
                <label2>Don't have an account?</label2><a href="index.php" style="color:rgb(206, 12, 44);text-decoration:none;">&nbsp;Register</a>
            </form>
        </div>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("id2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>
