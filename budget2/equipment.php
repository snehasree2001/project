<?php
include("config.php");

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data
    $select_clg = $_POST['select_clg'];
    $faculty_name = $_POST['faculty_name'];
    $department = $_POST['department'];
    $date_purchase = $_POST['date_purchase'];
    $category = $_POST['category'];
    $equipment_list = $_POST['equipment_list'];
    $specification = $_POST['specification'];
    $unit_price = $_POST['unit_price'];
    $quantity = $_POST['quantity'];
    $cost = $_POST['cost'];
    $total_cost = $_POST['total_cost'];
    $principal_comment = $_POST['principal_comment'];
    
    // SQL query to insert data into the table
    $sql = "INSERT INTO equipment (select_clg, faculty_name, department,date_purchase, category,equipment_list, specification,unit_price, quantity, cost, total_cost,status,principal_comment) 
    VALUES ('$select_clg','$faculty_name','$department', '$date_purchase', '$category', '$equipment_list', '$specification', '$unit_price', '$quantity', '$cost', '$total_cost','$status','$principal_comment')";
    
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
