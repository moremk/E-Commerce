<?php
session_start();
require "conf.php";

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="product.css"> 
</head>
<body style="background:linear-gradient(to right,brown,yellow);">
    <div class="tom">
        <img src="logo.png" class="img">
        <a href="logout.php" style="margin-right:40px;"><input type='submit' value='Logout'></a>
        <a href="pay.php" style="margin-right:-50px;"><input type='submit' value='Book History'></a>
    </div>
    <div class="demo">
        <a href="addbook.php" class="add"><input type='submit' value='Add Book'></a>
        <div class="container py-2">
            <div class="row mt-5">
                <div class="row">
                    <?php
                    $q = "SELECT * FROM dbupload";
                    $result = mysqli_query($con, $q);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div class="col-md-3"><br>
                            <div class="card">
                                <div class='card-body'>
                                    <form method="post" action="product.php?id=<?= $row['id'] ?>">
                                        <img src="Image/<?= $row['image'] ?>" style='height:150px;width:220px;'>
                                        <h2 style="color:rgb(207, 19, 66);font-size:15px;">Price: <?= $row['prize']; ?> Rs</h2>
                                        <input type="submit" value="Add Cart" name="Acart">
                                    </form>
                                </div>
                            </div>
                        </div>   
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <?php
        if (isset($_POST['Acart'])) {
            $id = $_GET['id']; // Assuming you handle this securely in your actual application
            $q = "SELECT * FROM dbupload WHERE id=?";
            $stmt = mysqli_prepare($con, $q);
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $item = array(
                    'id' => $id,
                    'book' => $row['image'],
                    'price' => $row['prize']
                );
                $_SESSION['cart'][] = $item;
            } else {
                echo "<script>alert('Add cart error');</script>";
            }
        }
        ?>
    </div>
    <form action="pay.php" method="post">
        <?php
        if (!empty($_SESSION['cart'])) {
            echo "<table class='table table-bordered' style='margin-left:100px;width:800px;'>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Book</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>";

            foreach ($_SESSION['cart'] as $item) {
                echo "<tr>
                        <td><input type='text' name='name' style='margin-left:2px;' required></td>
                        <td><img src='Image/{$item['book']}'><br><br><input type='text' name='book' style='margin-left:2px;' required></td>
                        <td><input type='number' name='prize' value='{$item['price']}' readonly></td>          
                        <td><input type='number' name='qt' value='1' style='width:50px;margin:auto;'></td>
                        <td><input type='text' name='address' style='margin-left:2px;' required></td>
                        <td><a href='remove.php?id={$item['id']}'><input type='button' value='Remove' style='margin-top:-8px; color:white;background-color:rgb(255, 22, 61); border: none; outline:none;width:100px;  height: 40px;'></a></td>
                      </tr>";
            }
            echo "</tbody></table>";
            echo "<input type='submit' value='Book' name='submit' style='float:right;margin-right:210px;'>";
        } else {
            echo "";
        }
        ?>
    </form>
</body>
</html>
