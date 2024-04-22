 <?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "productmgt";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    if(isset($_SESSION['username'])) {
         header("Location: /khos/add.php");

    }

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password before comparing with the database
    $hashed_password = md5($password); // You should use a more secure hashing algorithm like bcrypt
    
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful
        $_SESSION['username'] = $username;
        header("Location: /khos/add.php"); // Redirect to dashboard or any other page after successful login
        exit();
    } else {
        // Login failed
        $error = "Invalid username or password";
    }
    

    //    



}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <section>
    <form action="login.php" method="post">
        <div class="container">
            <h2>LOGIN</h2>
            <?php if(isset($error)) { ?>
                <p><?php echo $error; ?></p>
             <?php } ?>
            <label for="">Username</label><input type="text" name="username">
            <label for="">Password</label><input type="password" name="password" id="">
            <button id="bin" type="submit" name="login">Login</button>
            <!-- <button id="bout" type="submit" name="logout">logout</button> -->
            <br><br>
        </div>
    </form>
    </section>
</body>
</html>