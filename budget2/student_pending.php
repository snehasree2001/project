<?php
// Include the Composer autoloader

// Include your config.php file
include "config.php";

// Check if SNo parameter is provided in the URL
if(isset($_GET['SNo'])) {
    $SNo = $_GET['SNo'];
    
    // Fetch details of the selected row
    $query_pending_details = "SELECT * FROM student WHERE SNo='$SNo'";
    $result_pending_details = mysqli_query($con, $query_pending_details);
    
    // Check if the row exists
    if(mysqli_num_rows($result_pending_details) > 0) {
        $row = mysqli_fetch_assoc($result_pending_details);
    } else {
        // Redirect to main page if the row doesn't exist
        header("Location: student_admin.php");
        exit();
    }
} else {
    // Redirect to main page if SNo parameter is not provided
    header("Location: student_admin.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get additional comment from the form
    $management_comments = $_POST['management_comments'];

    // Determine the status based on which button was clicked
    $status = isset($_POST['approve']) ? "Approved" : (isset($_POST['disapprove']) ? "Disapproved" : "");

    // Update the budget table with the additional comment and status
    $update_query = "UPDATE student SET status='$status', management_comments='$management_comments' WHERE SNo='$SNo'";
    mysqli_query($con, $update_query);
    header("Location: student_admin.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Entry Details</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-image: url("assest/pg.jpeg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh; /* Ensure the body covers the entire viewport height */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 90%;
            width: 400px; /* Adjust width as needed */
        }

        .container h2 {
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
            color: #333333;
        }

        .details {
            margin-bottom: 20px;
        }

        .details p {
            margin-bottom: 10px;
        }

        textarea,
        input[type="text"] {
            width: calc(100% - 20px); /* Adjust width to fill container */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .button-container {
            text-align: center;
        }

        button {
            width: 45%; /* Adjust width as needed */
            padding: 10px 20px;
            margin: 0 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 14px;
        }

        button[name="approve"] {
            background-color: #4CAF50;
            color: #ffffff;
        }

        button[name="disapprove"] {
            background-color: #f44336;
            color: #ffffff;
        }

        button:hover {
            filter: brightness(110%);
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h2> Entry Details</h2>
        <div class="details">
        <p><strong>S. No:</strong> <?php echo $row['SNo']; ?></p>
            <p><strong>College Name:</strong> <?php echo $row['select_clg']; ?></p>
            <p><strong>Date:</strong> <?php echo $row['date_from']. " to " . $row['date_to']; ?></p>
            <p><strong>Student Name:</strong> <?php echo $row['student_name']; ?></p>
        
            <p><strong>Department:</strong> <?php echo $row['department']; ?></p>
            <p><strong>Time:</strong> <?php echo $row['time_from']." to " . $row['time_to']; ?></p>
            <p><strong>Activity Type:</strong> <?php echo $row['activity_type']; ?></p>
            <p><strong>Event Name:</strong> <?php echo $row['event_name']; ?></p>
            <p><strong>Institute Name:</strong> <?php echo $row['institute_name']; ?></p>
            <p><strong>Location</strong> <?php echo $row['location']; ?></p>
            
        
            <p><strong>Budget Requested:</strong> <?php echo $row['budget_requested']; ?></p>
    <!-- Add more fields as needed -->
</div>
<form method="POST">
            <label for="management_comments"><b>Management Comments </b></label><br>
            <textarea id="management_comments" name="management_comments" row="5" column="20"></textarea><br>
            
            <!-- Buttons for approving and disapproving -->
            <div class="button-container">
                <button type="submit" name="approve">Approve</button>
                <button type="submit" name="disapprove">Disapprove</button>
            </div>

        <!-- Add more details and style them as needed -->
    </div>
</body>
</html>