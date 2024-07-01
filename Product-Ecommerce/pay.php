<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="pay.css">
    <title>Booking</title>
</head>
<body>
<div class="tom">
    <img src="logo.png" class="img">
    <a href="logout.php" style="margin-right:40px;"><input type='submit' value='Logout'></a>
    <a href="product.php" style="margin-right:-50px;"><input type='submit' value='Product'></a>
</div>

<?php
require 'conf.php';
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $book=$_POST['book'];
    $prize=$_POST['prize'];
    $qt=$_POST['qt'];
    $address=$_POST['address'];
    $q="insert into item(name,bookname,prize,quantity,address) values('$name','$book','$prize','$qt','$address')";
    $result=mysqli_query($con,$q);
}

$q="select * from item";
$result=mysqli_query($con,$q);
echo "<form action='payscript.php' method='post'>";
echo "<table class='table table-bordered' style='text-align:center;'>";
echo "<thead>";
echo "<tr style='background-color: rgb(158, 163, 168);color: white;'>";
echo "<th scope='col'>Name</th>";
echo "<th scope='col'>Book Name</th>";
echo "<th scope='col'>Prize</th>";
echo "<th scope='col'>Quantity</th>";
echo "<th scope='col'>Address</th>";
echo "<th scope='col'>Pay</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

while($row=mysqli_fetch_assoc($result))
{
    echo "<tr>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['bookname']."</td>";
    echo "<td>".$row['prize']."</td>";
    echo "<td>".$row['quantity']."</td>";
    echo "<td>".$row['address']."</td>";
    echo "<td><input type='submit' value='PAY' id='id1'></td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
echo "</form>";
?>
</body>

</html>
