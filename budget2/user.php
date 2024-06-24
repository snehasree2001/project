<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <div class="form-group">
            <label for="select_clg">Select College</label>
            <select id="select_clg" name="select_clg" required>
                <option hidden>Select College</option>
                <option value='SKCET'>SKCET</option>
                <option value='SKASC'>SKASC</option>
                <option value='SKCT'>SKCT</option>
                <option value='SKACAS'>SKACAS</option>
            </select>
        </div>
        <a href="home.html">Register</a>
        <!-- Change the href of the "View Status" link to "#" -->
        <a href="#" id="view_status">View Status</a>
    </div>

    <script>
        // Get the select element
        var select = document.getElementById('select_clg');

        // Get the "View Status" link
        var viewStatusLink = document.getElementById('view_status');

        // Add event listener for click event on "View Status" link
        viewStatusLink.addEventListener('click', function(event) {
            // Prevent the default action of the link
            event.preventDefault();

            // Get the selected college
            var selectedCollege = select.value;
            
            // If a college is selected, redirect to status.php with the selected college as a parameter
            if(selectedCollege !== 'Select College') {
                window.location.href = "status.php?select_clg=" + selectedCollege;
            } else {
                // If no college is selected, alert the user to select a college
                alert("Please select a college.");
            }
        });
    </script>
</body>
</html>
