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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
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

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: block;
            margin-bottom: 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        .header {3
            background-color: #444;
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
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
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


        ul li:hover{
          background-color: #808080;
          padding: 10px;
          border-radius:15px;
        }
        nav ul li a{
            text-decoration: none;
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
    </style>
</head>
<body>
<div class="container">
    <div class="sidebar">
        <div class="header">

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
      <a href="admin.php">Add New</a>
      </div>
      <div class="menu-item">
      <a href="?logout=true">Logout</a>
      </div>
        </div>
      
    </div>
    <div class="content">
        <header>
            <h2>Welcome to the Admin Dashboard</h2>
        </header>
        <main>
            <div class="container mt-5">
                <div class="row mt-3">
                    <div class="col-md-12">
                        <form action="" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search by name" name="search">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </form>
                        <div class="card">
                            <div class="card-header bg-info">
                                <h4 class="text-white text-center">Details of the Student</h4>
                            </div>
                            <div class="card-body">
                            <?php
                            $conn = mysqli_connect("localhost","root","","e-comm");

                            $limit = 5;
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $start = ($page - 1) * $limit;

                            if(isset($_GET['search'])) {
                                $search = $_GET['search'];
                                $query = "SELECT * FROM `images_store` WHERE `name` LIKE '%$search%' LIMIT $start, $limit";
                            } else {
                                $query = "SELECT * FROM `images_store` LIMIT $start, $limit";
                            }

                            $query_run = mysqli_query($conn, $query);
                            ?>

                            <table class="table">
                                <thead>
                                    <th class="px- py-2">ID</th>
                                    <th class="px-4 py-2">Student's Name</th>
                                    <th class="px-4 py-2">Student's Class</th>
                                    <th class="px-4 py-2">Student's Contact</th>
                                    <th class="px-4 py-2">Student's Image</th>
                                    <th class="px-4 py-2">EDIT</th>
                                    <th class="px-4 py-2">DELETE</th>
                                </thead>
                                <tbody>
                                    <?php
                                    if(mysqli_num_rows($query_run) > 0) {
                                        foreach($query_run as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['class']; ?></td>
                                        <td><?php echo $row['contact']; ?></td>
                                        <td>
                                            <img src="<?php echo "Image/".$row['image']; ?>" width="100px" alt="">
                                        </td>
                                        <td><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-info">EDIT</a></td>
                                        <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">DELETE</a></td>
                                    </tr> 
                                    <?php
                                        }
                                    } else {
                                    ?>
                                    <tr>
                                        <td colspan="7">No Records Available</td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            $sql = "SELECT COUNT(id) AS total FROM images_store";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $total_pages = ceil($row["total"] / $limit);

                            if($page > 1){
                                echo "<a href='?page=".($page - 1)."' class='btn btn-primary'>Previous</a>";
                            }

                            for ($i=1; $i <= $total_pages; $i++){
                                echo "<a href='?page=".$i."' class='btn btn-primary'>$i</a>";
                            }

                            if($page < $total_pages){
                                echo "<a href='?page=".($page + 1)."' class='btn btn-primary'>Next</a>";
                            }
                            ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <p class="text-center">&copy; 2024 Admin Dashboard</p>
        </footer>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
