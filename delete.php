<?php
include "connection.php";

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Construct SQL query to delete the record
    $sql = "DELETE FROM images_store WHERE id=$id";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // If deletion is successful, redirect back to user_view.php
        header("Location: user_view.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // If ID is not provided, redirect back to user_view.php
    header("Location: user_view.php");
    exit();
}
?>
