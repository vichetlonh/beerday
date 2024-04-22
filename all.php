<?php
// session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "productmgt";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM product");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>
    <!-- navbar -->
    <!-- <nav class="navbar navbar-expand-lg bg-light ">
        <div class="container">
          <img src="./img/beer-logo-gb.png" alt="" id="logo">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="all.php">Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>

            </ul>
            <form class="d-flex">
              <input class="px-2 search" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-danger" type="submit">Search</button>
              <a href="login.php"><img src="./img/user-gb.png" alt="" id="user";></a>
              
            </form>
            <a href=""><i class="bi bi-person-circle"></i></a>
          </div>
        </div>
      </nav> -->

    <!-- ============== -->

    <?php include 'components/header.php';?>
    <section class="product">
      <div class="container py-5">
        <div class="row py-5 ">
          <div class="col-lg-5 m-auto text-center">
            <h1>ទំនិញលក់ដាច់</h1>
            <h6 style="color: red;">ទំនិញ</h6>
          </div>
        </div>
        <div class="row">
          <?php
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $id = $row["id"];
              $name = $row["name"]; // Assuming a column named "name" exists
              $price = $row["price"]; // Assuming a column named "price" exists (replace with your actual column name for price)
              $image = "./img/default.jpg"; // Set a default image path (replace with your actual default image)
              if (isset($row["image"])) { // Check if an "image" column exists and has a value
                $image = $row["image"]; // Use the value from the "image" column if available
              }
              
              echo "<div class='col-lg-3 text-center'>
                      <div class='card boder-0 bg-light mb-2'>
                        <div class='card-body'>
                          <img src='upload_image/$image' class='img-luid' alt=''>
                          <h6>$name</h6>
                      <p>$$price</p>
                      <a href='description.php?id=$id'><button name='yy' class='tt'>កម្មង់ឥឡូវ</button></a>
                        </div>
                      </div>
                      
                    </div>";
            }
          } else {
            echo "0 results";
          }
          ?>
        </div>
      </div>
    </section>
    <section class="job">
      <div class="conatiner p-3 mb-2 bg-light text-dark text-center py-5" id="hh">
        <h5>តាមដានពួកយើងតាមរយៈ</h5>
          <a href="" >facebook</a>
          <a href="">Youtube</a>
          <a href="">Instagram</a>
          <h5 class="py-2">© រក្សា​សិទ្ធិ​គ្រប់​យ៉ាង​ដោយ​ Chet ឆ្នាំ​២០២៤</h5>
        
      </div>
    </section>
</body>
</html>