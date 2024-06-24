<?php
include "config.php";

// Fetch distinct academic years
$query_view_details = "SELECT * FROM budget";
$result_view_details = mysqli_query($con, $query_view_details);

// Set default status to 'pending' if status parameter is not provided
$status = isset($_GET['status']) ? $_GET['status'] : 'pending';

// Fetch rows based on status
$query_status_details = "SELECT * FROM budget WHERE status='$status'";
$result_status_details = mysqli_query($con, $query_status_details);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>admin</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
<style>
 * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    color:black;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
}

.container {
    margin: 20px auto;
    max-width: 1200px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    font-size: 12px; /* Adjusted font size */
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f2f2f2;
}

button {
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #ddd;
}

.status-buttons {
    margin-bottom: 20px;
    overflow: auto;
}

.status-buttons a {
    margin-right: 10px;
    text-decoration: none;
}

.status-buttons button {
    background-color: #e0e0e0;
    color: #333;
    font-size: 16px;
    border: 1px solid #ccc;
    transition: background-color 0.3s ease;
}

.status-buttons button.active {
    background-color: #2196F3;
    color: #fff;
}

.status-buttons button:hover {
    background-color: #ddd;
}

.container table th,
.container table td {
    padding: 14px;
}

@media screen and (max-width: 768px) {
    .container table {
        font-size: 14px;
    }

    .status-buttons:hover {
        overflow: auto;
       border-bottom: 2px solid black;
    }
}ul { 
  margin: 150px auto 0; 
  padding: 0; 
  list-style: none; 
  display: table;
  width: 600px;
  text-align: center;
}
li { 
  display: table-cell; 
  position: relative; 
  padding: 15px 0;
  padding-left: 90px;
}
a {
  color: black;
  text-transform: uppercase;
  text-decoration: none;
  letter-spacing: 0.15em;
  
  display: inline-block;
  padding: 15px 20px;
  position: relative;
}
a:after {    
  background: none repeat scroll 0 0 transparent;
  bottom: 0;
  content: "";
  display: block;
  height: 2px;
  left: 50%;
  position: absolute;
  background: black;
  transition: width 0.3s ease 0s, left 0.3s ease 0s;
  width: 0;
}
a:hover:after { 
  width: 100%; 
  left: 0; 
}
@media screen and (max-height: 300px) {
  ul {
    margin-top: 40px;
  }
}


</style>
</head>
<body>
    <div>
        <!-- Status buttons -->
        <div style="display:flex; flex-direction: row;justify-content:center;gap:80px">
        <ul>
          <center> <li> <a href="?status=pending"> <?php if($status == 'pending')  ?>Pending</a></li>
           <li> <a href="?status=approved"> <?php if($status == 'approved')  ?>Approved</a></li>
<li> <a href="?status=disapproved"> <?php if($status == 'disapproved') ?>Disapproved</a></li></center>
        </div>

        <!-- Status table -->
        <div class="container">
            <table border="1" style="font-size:4px;margin-left:35px">
                <!-- Table headers -->
                <tr>
                    <th>S. No.</th>
                    <th>College Name</th>
                    <th>Date From</th>
                    <th>Date To</th>
                    <th>Department</th>
                    <th>Duration</th>
                    <th>Activity Type</th>
                    <th>Activity Affiliation</th>
                    <th>Event Title</th>
                    <th>Resource Person Details</th>
                    <th>Target Audience</th>
                    <th>Venue</th>
                    <th>Budget Requested</th>
                    <th>Faculty Coordinator</th>
                    <th>Principal Comments</th>
                    <th>Actions</th> <!-- New column for buttons -->
                </tr>
                <!-- Table rows -->
                <?php
                while ($row = mysqli_fetch_assoc($result_status_details)) {
                    echo "<tr>";
                    echo "<td>" . $row['SNo'] . "</td>";
                    echo "<td>" . $row['select_clg'] . "</td>";
                    echo "<td>" . $row['date_from'] . "</td>";
                    echo "<td>" . $row['date_to'] . "</td>";
                    echo "<td>" . $row['department'] . "</td>";
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
                    // Action buttons
                    echo "<td>";
                    if ($status == 'approved') {
                        echo "<a href='view.php?SNo=" . $row['SNo'] . "'><button>View</button></a>";
                    } 
                    elseif ($status == 'disapproved') {
                        echo "<a href='view.php?SNo=" . $row['SNo'] . "'><button>View</button></a>";
                    } else {
                        echo "<a href='pending.php?SNo=" . $row['SNo'] . "'><button>Pending</button></a>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
