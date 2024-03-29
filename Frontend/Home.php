<?php
session_start();
$servername = "localhost";
$username ="root";
$password ="";
$db_name ="e-comm";
$conn = new mysqli($servername,$username,$password,$db_name);
if($conn->connect_error){
    die ("connection failed".$conn->connect_error);
}
$query = "SELECT * FROM images_store";
$result = $conn->query($query);

if(isset($_GET['logout']) && $_GET['logout'] == 'true') {
  // Destroy session data
  session_unset();
  session_destroy();
  
  // Redirect to login page after logout
  header("Location: user_login.php");
  exit;
}

  if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: user_login.php");
    exit;
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
   
</head>
<style>

  .student-details{
    display: flex;
    justify-content:space-around;
    padding-top:40px;
  }
  .image img{
    width:45%;
  }
  .details h1,h3{
    font-family: "Playfair Display", serif;


  }
  div.at-container {
		display: flex;
		align-items: center;
		justify-content: center;
		height: 100%;
	}
	.at-item {
		color: #3079ed; font-weight:bold; font-size:3em;
		
		animation-name: focus-in-contract;
		animation-duration: 1s;
		animation-timing-function: linear;
		animation-delay: 0s;
		animation-iteration-count: 1;
		animation-direction: alternate-reverse;
		animation-fill-mode: none;
			
		
	}
	@keyframes focus-in-contract {
			
		0% {
			letter-spacing:1em;
			filter:blur(12px);
			opacity:0;
		}
		100% {
			filter:blur(0);
			opacity:1;
		}
	}
  .image img {
        width: 100px; /* Set width */
        height: 100px; /* Set height */
        object-fit: cover; /* Maintain aspect ratio */
    }
    .student-details {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px; /* Add some gap between items */
  }

  .student {
    width: 50%; /* Set width to 100% */
    border: 1px solid #ccc;
    padding: 20px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    background-color: #fff;
    margin-bottom: 20px;
    overflow: auto; 
    display: flex;
  justify-content: space-around;
  }

  .student .image img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    margin-bottom: 10px;
  }

  .student .details {
    text-align: center;
  }

  .details h1, .details h3 {
    font-family: "Playfair Display", serif;
    margin: 0;
  }

  .image img:hover{
    transform: scale(1.2);
    content: url('https://plus.unsplash.com/premium_photo-1664100194845-468e6495dc66?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw1OHx8fGVufDB8fHx8fA%3D%3D');
  }

  .details:hover{
    transform: scale(1.2);

  }
 #logout{
  background-color:red;
   color:#fff;
   padding:10px;
   border-radius:12px;
   float:right;
   text-decoration:none;
 }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Students Details</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
        <a href="?logout=true" id="logout">Logout</a>

        </li>

       
       
      </ul>
    </div>
  </div>
</nav>

<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
      <div class="banner">
          <marquee behavior="" direction="">WELCOME TO THE SITE OF COLLEGE</marquee>
      </div>
  <div class="carousel-item"> 
      <img src="https://images.unsplash.com/photo-1529068755536-a5ade0dcb4e8?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTA2fHxzdHVkZW50fGVufDB8fDB8fHww" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item active">
      <img src="https://images.unsplash.com/photo-1616512659455-111d3367649f?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="...">
    </div>
    
    <div class="carousel-item">
      <img src="https://images.unsplash.com/photo-1610962381137-50ef93055125?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fHNjaG9vbCUyMGJ1aWxkaW5nfGVufDB8fDB8fHww" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<h1 style="text-align:center">Details of Students</h1>
<div class="student-details">
  <?php
  // Assuming $result is your query result
  while ($row = mysqli_fetch_assoc($result)) {
  ?>
    <div class="student">
        <div class="image">
          <img src="<?php echo "../image/".$row['image']; ?>" alt="">
        </div>
        <div class="details">
          <h3><?php echo $row['name']; ?></h3>
          <p><?php echo $row['class']; ?></p>
          <p><?php echo $row['contact']; ?></p>
        </div>
      </div>
  <?php
  }
  ?>
</div>






</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html> 
