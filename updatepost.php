<?php
$conn = mysqli_connect('localhost','root','','productmgt');
if(isset($_POST['uplord'])){
    $ID = $_POST['id'];
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    
    // Check if a new image is uploaded
    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $IMAGE = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "upload_image/".$IMAGE);
        $image_query = ", image='$IMAGE'";
    } else {
        // No new image uploaded, do not update the image column
        $image_query = "";
    }

    // Update query with conditional update for image column
    $update_query = "UPDATE product SET name='$NAME' , price='$PRICE' $image_query WHERE id=$ID";
    $conn->query($update_query);

    header("Location: /khos/add.php");
    exit;
}
?>
