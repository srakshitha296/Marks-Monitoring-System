<?php 
include('header.php');
include('navigation.php');
include('connection.php');

// Retrieve student details
$result = getStudentDetails();
$message = "";
$smessage = "";

// Determine the maximum number of rows based on the number of records in the result set
$maxRows = mysqli_num_rows($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the form submission is for updating existing records
    if (isset($_POST['update'])) {
        // Handle updating existing records
        handleUpdate($maxRows);
    } 
    // Check if the form submission is for inserting new records
    elseif (isset($_POST['upload'])) {
        // Handle inserting new records
        handleInsert();
    }
}

if ($result && mysqli_num_rows($result) > 0) {
?>
<img src="aj2.jpg" alt="" class="img-fluid">

<div class="container-fluid">
    <!-- Your existing HTML code -->
</div>

<div class="container">
    <form class="row g-3 my-3" method="POST">
        <!-- Your existing form code -->
    </form>
    
    <!-- Your existing HTML code -->
</div>

<?php 
mysqli_close($conn);
}

function handleUpdate($maxRows) {
    global $conn;

    // Loop through the submitted form data to update records
    for ($i = 1; $i <= $maxRows; $i++) {
        if (isset($_POST['update'.$i])) {
            // Handle update operation
            // Retrieve form data for the current row
            $usn = $_POST['usn'.$i];
            $name = $_POST['name'.$i];
            $sem = $_POST['sem'.$i];
            $mentor = $_POST['mentor'.$i];

            // Construct and execute SQL update query
            $sql = "UPDATE student SET name = '$name', sem = $sem, mentor = '$mentor' WHERE usn = '$usn'";
            $result = mysqli_query($conn, $sql);

            // Check if update was successful
            if ($result) {
                echo '<div class="alert alert-success"><b>Student Details Updated Successfully.</b></div>';
            } else {
                echo '<div class="alert alert-danger"><b>Error: Unable to update student details.</b></div>';
            }
        }
    }
}

function handleInsert() {
    // Handle insert operation
    // Your existing logic for inserting new records
}

function getStudentDetails() {
    global $conn;
    $sql = "SELECT * FROM student";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error: " . mysqli_error($conn);
        return false;
    }
    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        echo "No records found.";
        return false;
    }
}
?>
