<?php
// session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "productmgt";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


$conn = mysqli_connect('localhost', 'root', '', 'productmgt');
$ID = $_GET['id'];
$result = $conn->query("SELECT * FROM product WHERE id= $ID");


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>Product Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php include 'components/header.php';?>
  <?php
            while($row = $result->fetch_assoc()) {
             
              $name = $row["name"]; // Assuming a column named "name" exists
              $price = $row["price"]; // Assuming a column named "price" exists (replace with your actual column name for price)
              $image = "./img/default.jpg"; // Set a default image path (replace with your actual default image)
              if (isset($row["image"])) { // Check if an "image" column exists and has a value
                $image = $row["image"]; // Use the value from the "image" column if available
              }
              echo "  <form method='POST' id='from_up' enctype='multipart/form-data'>
                      <div class='container mt-5'>
                        <div class='row'>
                          <div class='col-md-6'>
                            <img src='upload_image/$image' class='img-fluid' alt='Product Image'width='400px' heigth='400px' >
                          </div>
                          <div class='col-md-6'>
                            <h2>$name</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <p><strong>Price:</strong>$$price</p>
                            <form>
                              <div class='form-group'>
                                <label for='quantity'>Quantity:</label>
                                <input type='number' id='quantity' class='form-control' min='1' value='1'>
                              </div>
                              <button type='button' id='add-to-cart-btn' class='btn btn-primary'>Add to Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      </form>";
                      
            }

          ?>
    <script src="./js/script.js"></script>
</body>
</html>