<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>SRI KRISHNA</title>
    <style>
        /* Your existing CSS styles */
        .body {
            background-image: url("assest/pg.jpeg");
            height: 100%; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .centerbox {
            background: #e9e7e0de;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 500px;
            height: 550px;
            max-width: 90%;
            position: relative;
            animation-name: fallIn;
            animation-duration: 0.5s;
            animation-timing-function: ease-in-out;
            text-align: left; /* Align text to the left */
        }
        .centerbox button {
            width: 80%;
            padding: 15px;
        }
        .button button:first-child {
            margin-bottom: 30px;
        }
        table {
            background-color: white; /* Set background color to white */
            border-collapse: collapse; /* Collapse the borders */
            width: 100%; /* Set table width to 100% */
            text-align: left; /* Align table content to the left */
        }
        th, td {
            border: none; /* Remove borders */
            padding: 8px; /* Add padding */
            text-align: left; /* Align text to the left */
        }
        th {
            background-color: #f2f2f2; /* Set background color for header cells */
        }
        @keyframes fallIn {
            from {
                transform: translateY(-100%);
            }
            to {
                transform: translateY(0);
            }
        }
        
    </style>
</head>
<body>
    <div class="Header h-20 w-full bg-blue-600 flex justify-center">
        <div class="logo ">
            <img class="h-10 mt-5 " src="assest/logo.png">
        </div>
        <div class="text-black text-center place-items-stretch pt-5 ml-5 mr-8">
            <h1 class="font-bold text-2xl text-white ">SRI KRISHNA INSTITUTIONS</h1>
        </div>
    </div>
    <div class="body h-screen flex justify-center place-content-center bg-gray-200 ">
        <div class="leftbox mt-24">
            <?php
            // Include config.php and start session
            include("config.php");
            session_start();
            
            // Check if select_clg parameter is set in the URL
            if(isset($_GET['college'])){
                $collegeName = mysqli_real_escape_string($con, $_GET['college']);
                
                // Query to select details of the selected college
                $result = mysqli_query($con, "SELECT * FROM budget WHERE select_clg='$collegeName'");
                
                // Check if the query executed successfully
                if($result){
                    // Check if there are rows returned
                    if(mysqli_num_rows($result) > 0){
                        // Display the college details in a table
                        echo '<h2 class="text-center text-2xl font-bold text-gray-800 mb-8">Welcome to the ' . strtoupper($collegeName) . ' college</h2>';
                        echo '<table>';
                        echo "<tr>";
                        echo "<th>S. No.</th>";
                        echo "<th>College Name</th>";
                        echo "<th>Date From</th>";
                        echo "<th>Date To</th>";
                        echo "<th>Department</th>";
                        echo "<th>Time From</th>";
                        echo "<th>Time To</th>";
                        echo "<th>Duration</th>";
                        echo "<th>Activity Type</th>";
                        echo "<th>Activity Affiliation</th>";
                        echo "<th>Event Title</th>";
                        echo "<th>Resource Person Details</th>";
                        echo "<th>Target Audience</th>";
                        echo "<th>Venue</th>";
                        echo "<th>Budget Requested</th>";
                        echo "<th>Faculty Coordinator</th>";
                        echo "<th>Principal Comments</th>";
                        echo "<th>Additional Comments</th>";
                        echo "<th>Status</th>";
                        echo "<th>Delete</th>";
                        echo "</tr>";

                        // Fetch and display rows
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['SNo'] . "</td>";
                            echo "<td>" . $row['select_clg'] . "</td>";
                            echo "<td>" . $row['date_from'] . "</td>";
                            echo "<td>" . $row['date_to'] . "</td>";
                            echo "<td>" . $row['department'] . "</td>";
                            echo "<td>" . $row['time_from'] . "</td>";
                            echo "<td>" . $row['time_to'] . "</td>";
                            echo "<td>" . $row['duration'] . "</td>";
                            echo "<td>" . $row['activity_type'] . "</td>";
                            echo "<td>" . $row['activity_affiliation'] . "</td>";
                            echo "<td>" . $row['event_title'] . "</td>";
                            echo "<td>" . $row['resource_name'] . ", " . $row['designation'] . ", " . $row['company_details'] . ", " . $row['con_number'] . "</td>";
                            echo "<td>" . $row['academic_year'] . ", " . $row['audience_department'] . "</td>";

                            echo "<td>" . $row['venue'] . "</td>";
                            echo "<td>" . $row['budget_requested'] . "</td>";
                            echo "<td>" . $row['faculty_name'] . ", " . $row['faculty_number'] . "</td>";
                            echo "<td>" . $row['principal_comment'] . "</td>";
                            echo "<td>" . $row['additional_commant'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td><button style='background-color: #ff0000; color: white; border: none; padding: 8px 12px; border-radius: 5px; cursor: pointer; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);' onclick='deleteRow(\"$collegeName\", {$row['SNo']})'>Delete</button></td>";
                            echo "</tr>";
                        }
                        // Close the table
                        echo "</table>";
                    } else {
                        echo "No data found for the selected college.";
                    }
                } else {
                    echo "Error executing the query: " . mysqli_error($con);
                }
            } else {
                echo "Please select a college.";
            }
            
            ?>
        </div>
    </div>
    <script>
    function deleteRow(collegeName, deleteId) {
        // Confirm before deleting
        if(confirm("Are you sure you want to delete this row?")) {
            // Redirect to delete.php with the delete_id and college parameters
            window.location.href = delete.php?delete_id=${deleteId}&college=${encodeURIComponent(collegeName)};
        }
    }
</script>
</body>
</html>
