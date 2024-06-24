<?php
include("config.php");

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data
    $select_clg = $_POST['select_clg'];
    $date_from = $_POST['date_from'];
    $date_to = $_POST['date_to'];
    $department = $_POST['department'];
    $time_from = $_POST['time_from'];
    $time_to = $_POST['time_to'];
    $duration = $_POST['duration'];
    $activity_type = $_POST['activity_type'];
    $activity_affiliation = $_POST['activity_affiliation'];
    $event_title = $_POST['event_title'];
    $resource_name = $_POST['resource_name'];
    $designation = $_POST['designation'];
    $company_details = $_POST['company_details'];
    $con_number = $_POST['con_number'];
    $academicYears = isset($_POST['academic_year']) ? $_POST['academic_year'] : array();
    $audience_department= isset($_POST['audience_department']) ? $_POST['audience_department'] : array();

    
    // Serialize the array and join its elements with a delimiter
    $serializedAcademicYears = implode(',', $academicYears);
    $serializedAudience_department = implode(',', $audience_department);
    $venue = $_POST['venue'];
    $budget_requested = $_POST['budget-requested'];
    $faculty_name = $_POST['faculty_name'];
    $faculty_number = $_POST['faculty_number'];
    $principal_comment = $_POST['principal_comment'];
    $status= $_POST['status'];

    

    // SQL query to insert data into the table
    $sql = "INSERT INTO budget (select_clg, date_from, date_to, department, time_from, time_to,duration, activity_type, activity_affiliation, event_title, resource_name, designation, company_details, con_number, academic_year,audience_department,venue, budget_requested, faculty_name, faculty_number, principal_comment, status) 
    VALUES ('$select_clg', '$date_from', '$date_to', '$department', '$time_from', '$time_to','$duration', '$activity_type', '$activity_affiliation', '$event_title', '$resource_name', '$designation', '$company_details', '$con_number', '$serializedAcademicYears','$serializedAudience_department' ,'$venue', '$budget_requested', '$faculty_name', '$faculty_number', '$principal_comment', '$status')";
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
