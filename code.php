<?php

session_start();

$conn = mysqli_connect("localhost","root","","e-comm");

if(isset($_POST['save_stud_image']))
{
   $name =$_POST['name'];
   $class =$_POST['class'];
   $contact =$_POST['contact'];
   $image =$_FILES['image']['name'];
}

// if(file_exists("upload/".$_FILES['image']['name'])){
//         $filename = $_FILES['image']['name'];
//         $_SESSION['status'] = "Image already exists".$filename;
//         header('Location:create.php');
// }else{}


$allowed_extensions = array('gif', 'png', 'jpg', 'jpeg'); 
$filename = $_FILES['image']['name'];
$file_extension = pathinfo($filename, PATHINFO_EXTENSION);

if (!in_array($file_extension, $allowed_extensions)) {
    $_SESSION['status'] = "You are allowed with only jpg, png, jpeg, and gif files";
    header('Location: user_view.php');
} else {

$query ="INSERT INTO `images_store`(`name`, `class`, `contact`, `image`) VALUES ('$name','$class','$contact','$image')";

$query_run = mysqli_query($conn,$query);

if($query_run){

    move_uploaded_file($_FILES["image"]["tmp_name"],"Image/".$_FILES["image"]["name"]);
    $_SESSION['status']="Image stored succesffully";
    header('location:user_view.php');
}
else{
    $_SESSION['status']="Image stored succesffully";
    header('location:user_view.php');
}

}







if(isset($_POST['update'])){
    $name = $_POST['stud_name'];
    $class = $_POST['stud_class'];
    $contact = $_POST['stud_contact'];
    $new_image = $_POST['stud_image_new']['name'];
    $old_image = $_POST['stud_image_old'];


    if($new_image !=''){
            $update_filename = $_POST['stud_image_new']['name']; 
    }else{
        $update_filename = $old_image; 

    }
}
?>