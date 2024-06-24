<?php
include("config.php");

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data
    $select_clg = $_POST['select_clg'];

    $date_from = $_POST['date_from'];
    $date_to = $_POST['date_to'];
    $faculty_name = $_POST['faculty_name'];
    $department = $_POST['department'];
    $time_from = $_POST['time_from'];
    $time_to = $_POST['time_to'];
    $duration = $_POST['duration'];
    $activity_type = $_POST['activity_type'];
    $event_name = $_POST['event_name'];
    $institute_name = $_POST['institute_name'];
    $location = $_POST['location'];
    $budget_requested = $_POST['budget_requested'];
    $status= $_POST['status'];

    
    // SQL query to insert data into the table
    $sql = "INSERT INTO faculty (select_clg, date_from, date_to, faculty_name, department, time_from, time_to, duration, activity_type, event_name, institute_name, location, budget_requested, status) 
    VALUES ('$select_clg','$date_from', '$date_to', '$faculty_name', '$department', '$time_from', '$time_to', '$duration', '$activity_type', '$event_name', '$institute_name', '$location', '$budget_requested', '$status')";
    
    // Execute the query
    if(mysqli_query($con, $sql)) {
        // Redirect to thank you page
        header("Location: thankyou.php");
        exit();
    } else {
        // Error message if insertion fails
        echo "Error: " . mysqli_error($con);
    }
}
?>
