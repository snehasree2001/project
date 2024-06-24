<?php
// Include config.php
include("config.php");
session_start();

// Check if delete_id parameter is set in the URL
if(isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];

    // SQL query to delete the row with the given SNo
    $deleteQuery = "DELETE FROM budget WHERE SNo='$deleteId'";

    // Execute the query
    if(mysqli_query($con, $deleteQuery)) {
        // Row deleted successfully
        // Redirect back to status.php with the college name parameter intact if available
        if(isset($_GET['college'])) {
            $collegeName = urldecode($_GET['college']); // Decode college name if it was previously encoded
            header("Location: status.php?college=$collegeName");
        } else {
            header("Location: status.php");
        }
        exit();
    } else {
        // Error deleting row
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    // If delete_id parameter is not set
    echo "Invalid request.";
}
?>