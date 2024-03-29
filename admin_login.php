<?php
session_start();

// Check if the user is already logged in, redirect to dashboard if true
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: Home.php");
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "e-comm";
    $conn = new mysqli($servername, $username, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute SQL statement to fetch admin data
    $stmt = $conn->prepare("SELECT * FROM admin_login WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $admin['password'])) {
            // Admin credentials are correct, set session variables and redirect to dashboard
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_email'] = $email;
            header("Location: admin.php");
            exit;
        } else {
            // Password incorrect, display error message
            $error_message = "Incorrect email or password!";
        }
    } else {
        // No admin found with the given email, display error message
        $error_message = "No admin found with the given email!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        h2 {
            text-align: center;
        }

        form {
            /* text-align: center; */
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 300px;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        input[type="submit"] {
            width: 200px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
        button{
            background-color: green;
            padding: 13px;
            width: 36%;
            border-radius: 10px;
        }
        button a{
            color:#fff;
            text-decoration:none;
        }
        .login-container{
            box-shadow: 2px 2px 5px 2px rgba(0, 0, 0, 0.3);
            width: 300px;
        padding: 50px;
        border-radius: 12px;

        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <?php if (isset($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br>
            <input type="submit" value="Login">
            <p>New here register ! register Now</p>
           <button><a href="admin_registration.php">Register</a></button>
        </form>
    </div>
</body>
<!-- <script>
        function resetForm() {
            document.getElementById("email").value = "";
            document.getElementById("password").value = "";
        }
    </script> -->
</html>
