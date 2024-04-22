<link rel="stylesheet" href="index.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/kHos/index.php">
    <img src="./img/beer-logo-gb.png" alt="" height="100px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarText" >
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/khos/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/khos/all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/khos/about.php">About</a>
        </li>
      </ul>
      <span class="navbar-text">
      <?php

        // Check if user is logged in
        if(isset($_SESSION['username'])) {
            // User is logged in
            echo '<a href="/khos/logout.php" class="btn btn-danger">Logout</a>';
        } else {
            // User is not logged in
            echo '<a href="/khos/login.php"><img src="./img/user-gb.png" alt="" height="50px" id="user"></a>';
        }
        ?>
        </span>
        <!-- <a href=""><img src="./img/user-gb.png" alt="" height="50px" id="user"></a> -->
    </div>
  </div>
</nav>