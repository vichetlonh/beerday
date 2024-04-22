<?php
    session_start();
    $conn = mysqli_connect('localhost','root','','productmgt');
    
    if(isset($_POST['add-product'])){
        $NAME =$_POST['name'];
        $PRICE =$_POST['price'];
        $IMAGE =$_FILES['image']['name'];

        move_uploaded_file($_FILES['image']['tmp_name'], "upload_image/".$IMAGE);

        $conn->query("INSERT INTO product (name, price, image) values ('$NAME','$PRICE','$IMAGE')");
    }

    if(isset($_SESSION['username'])) {
         // Display a welcome message or perform other actions
    } else {
        header("Location: /khos/login.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="add.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    
    <?php include 'components/header.php';?>

    <div class="container p-5 mb-4" >
        <form action="add.php" method="POST" id="form_up" enctype="multipart/form-data">
            <h3>Add New Product</h3>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary mt-4" name="add-product">Submit</button>
        </form>
    </div>
    <!-- show product -->
    <section>
    <table class="table table-light text-center" >
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">PRICE</th>
                <th scope="col">IMAGE</th>
                <th scope="col">DELETE</th>
                <th scope="col">UPDATE</th>
            
            </tr>
        </thead>
        <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'productmgt');
        $pic = mysqli_query($conn, "SELECT * FROM product ORDER BY id DESC");

        while ($row = mysqli_fetch_array($pic)) {
            echo"
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['price']}</td>
                    <td> <img src='upload_image/{$row['image']}' width='100px' heigth='50px'></td>
                    <td><a href='delete.php?id={$row['id']}' class='btn btn-danger'>Delete</a></td>
                    <td><a href='update.php?id={$row['id']}' class='btn btn-danger'>Update</a></td>
                </tr>
            ";
        }
    ?>
    </table>

    </section>
</body>
</html>

