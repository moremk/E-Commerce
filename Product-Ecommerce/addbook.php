<?php
require 'conf.php'; 
if(isset($_POST['submit']))
{
    $prize = $_POST['prize'];   
    if($_FILES['img']['error']===4)
    {
        echo "<script>alert('image not upload');</script>";
    }
    else{
        $file = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $folder = 'Image/' . $file;

        if(move_uploaded_file($tmp_name,$folder)==true)
        {
        $query="INSERT INTO dbupload(image,prize)VALUES('$file','$prize')";
        $result=mysqli_query($con,$query);
        if($result)
        {
        echo "<script>alert('Book Added Successfully');</script>";
        header("Location: product.php");
        }   
    }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Welcome Product</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<style>
    .container{
    margin:auto;
   
}
.img{
    max-width:600px;
    height: 600px;
    background-image:
    linear-gradient(to right, rgba(245, 246, 252, 0.52), rgb(207, 100, 118)),
    url('product1.jpg');
    background-size: cover;
}
.demo{
    float:right;
    margin-right: 150px;
    margin-top: -500px;
}
label{
    text-align: center;
    color:rgb(255, 17, 57);
    font-size: 15px;
    font-style: bold;
}
input[type=file],[type=number]{
    margin-left: 30px;
    border: 2px solid rgb(207, 19, 66);
    border-radius: 4px;
    width:200px;
}
input[type=submit],[type=button]{
    color:white;
    margin-left: 80px;
    width:100px;
    border: none;
    height: 40px;
    outline:none;
    font-size: 13px;
    background-color: rgb(211, 11, 45);
}
    </style>

<body>
<div class="container">
        <div class="img">
</div>
        <div class="demo">
          <form action="" method="post" enctype="multipart/form-data">

                <h2 style="margin-left: 50px; color:rgb(206, 12, 44);font-size: 30px;font-style: bold;">AddBook</h2><br>
                <label class="form-label">Upload Book</label>
                <input type="file" name="img" id="id1" class="form-control"required>
                <br> 
                <label class="form-label">Prize</label>
                <input type="number" name="prize" id="id2" class="form-control" placeholder="enter prize here.." required>
                <br>
                <input type="submit" value="Add Book" name="submit">
                <br><br>
               <a href="product.php"> <input type="button" value="Cancel"></a>
            </form>
         </div>
</body>
</html>
