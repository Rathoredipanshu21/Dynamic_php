<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}

if(isset($_GET['logout']) && $_GET['logout'] == 'true') {
  // Destroy session data
  session_unset();
  session_destroy();
  
  // Redirect to login page after logout
  header("Location: admin_login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f8f9fa;
    }

    .container {
      display: flex;
      height: 100vh;
    }

    .sidebar {
      background-color: #333; 
      color: #fff;
      width: 250px;
      padding: 20px;
    }

    .content {
      flex-grow: 1;
      /* padding: 20px; */
    }

    .sidebar h2 {
      margin-top: 0;
    }

    .menu-item {
      margin-bottom: 10px;
    }

    .menu-item a {
      color: #fff;
      text-decoration: none;
      display: block;
      padding: 10px;
      border-radius: 5px;
    }

    .menu-item a:hover {
      background-color: #555;
    }

    .header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    .card {
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      background-color: #fff;
    }

    .card-header {
      background-color: #007bff;
      color: #fff;
      padding: 20px;
      /* border-top-left-radius: 10px;
      border-top-right-radius: 10px; */
    }

    .card-body {
      padding: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-control {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ced4da;
    }

    .form-control:focus {
      border-color: #007bff;
      outline: none;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      color: #fff;
      cursor: pointer;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="sidebar">
      <div class="header">
        <h2>Admin Dashboard</h2>
      </div>
      <div class="menu-item">
        <a href="#">Dashboard</a>
      </div>
      <div class="menu-item">
        <a href="user_view.php">Users detail</a>
      </div>
      <div class="menu-item">
        <a href="#">Products</a>
      </div>
      <div class="menu-item">
      <a href="?logout=true">Logout</a>

      </div>
    </div>
    <div class="content">
      <div class="header">
        <h2>Welcome to the Admin Dashboard</h2>
      </div>
      <!-- <p>This is the main content area where you can display various information and controls.</p> -->
      
      <div class="card">
        <div class="card-header">
          <h4 style="text-align:center">Add details of Student</h4>
        </div>
        <div class="card-body">
          <?php
          if(isset($_SESSION['status']) && $_SESSION !=''){
          ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Thank you! Form submitted </strong> <?php echo $_SESSION['status'];?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
            unset($_SESSION['status']);
          }
          ?>
          <form action="code.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Student Name</label>
              <input type="text" required name="name" class="form-control" placeholder="Enter Student Name">
            </div>
            <div class="form-group">
              <label for="">Student Class</label>
              <input type="text" required name="class" class="form-control" placeholder="Enter Student class">
            </div>
            <div class="form-group">
              <label for="">Contact Number</label>
              <input type="text" required name="contact" class="form-control" placeholder="Enter Contact number">
            </div>
            <div class="form-group">
              <label for="">Student Image</label>
              <input type="file" accept="image/*" required name="image" class="form-control">
            </div>
            <div class="form-group">
              <button type="submit" name="save_stud_image" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
