<?php 
    session_start();
    if(isset($_SESSION['username'])) {
        // User is logged in
        // Display a welcome message or perform other actions
    } else {
        header("Location: /khos/login.php");
    }

    $conn = mysqli_connect('localhost', 'root', '', 'productmgt');
    $ID = $_GET['id'];
    $Record  = mysqli_query($conn,"SELECT * FROM product WHERE id= $ID");
    $data = mysqli_fetch_array($Record)
        
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="add.css">
    <title>Document</title>
</head>
<body>
    
    <?php include 'components/header.php';?>
    <div class="container p-5" >
        <form action="updatepost.php" method="POST" id="form_up" enctype="multipart/form-data">
            <h3>Add New Product</h3>
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $data['id'] ?>">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['name'] ?>">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $data['price'] ?>">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                <img src="upload_image/<?php echo $data['image'] ?>" alt="" class="img-thumbnail" width="100px" height="50px">
            </div>
            <button type="submit" class="btn btn-primary mt-4 m-auto" name="upload">Update</button>
        </form>
    </div>
</body>
</html>