<?php
include "connection.php";
$id = "";
$name = "";
$class = "";
$contact = "";
$image = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['id'])) {
        header("location: e-comm/user_view.php");
        exit;
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM images_store WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $class = $row["class"];
        $contact = $row["contact"];
        $image = $row["image"];
    } else {
        header("location: images_store/user_view.php");
        exit;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $class = $_POST["class"];
    $contact = $_POST["contact"];
    
    // Check if a new image is uploaded
    if (!empty($_FILES["image"]["name"])) {
        $new_image = $_FILES["image"]["name"];
        $target = "Image/" . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target);
    } else {
        // If no new image is uploaded, retain the existing image
        $sql = "SELECT image FROM images_store WHERE id=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $new_image = $row["image"];
        }
    }

    $sql = "UPDATE images_store SET name='$name', class='$class', contact='$contact', image='$new_image' WHERE id='$id'";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>CRUD</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="col-lg-6 m-auto">
        <form method="post" enctype="multipart/form-data">
            <br><br>
            <div class="card">
                <div class="card-header bg-warning">
                    <h1 class="text-white text-center">Update Member</h1>
                </div><br>
                <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control"> <br>
                <label> NAME: </label>
                <input type="text" name="name" value="<?php echo $name; ?>" class="form-control"> <br>
                <label> CLASS: </label>
                <input type="text" name="class" value="<?php echo $class; ?>" class="form-control"> <br>
                <label> CONTACT: </label>
                <input type="text" name="contact" value="<?php echo $contact; ?>" class="form-control"> <br>
                <label> IMAGE: </label>
                <input type="file" name="image" accept=".jpg, .jpeg, .png, .gif" class="form-control"> <br>
                <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
                <a class="btn btn-info" href="user_view.php">Cancel</a><br>
            </div>
        </form>
    </div>
</body>

</html>
