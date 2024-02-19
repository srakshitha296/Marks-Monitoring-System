<?php 
include('header.php');
include('navigation.php');
include('connection.php');

// Retrieve student details
$result = getStudentDetails();
$message = "";
$smessage = "";
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2 text-end">
            <a href="home.php"><button type="submit" class="btn btn-danger my-2">Log Out</button></a>
        </div>
    </div>
</div>
<img src="cropped.png" alt="" class="img-fluid">

<div class="container">
    <form class="row g-3 my-3" method="POST">
        <h2 class="p-2">ENROLLED STUDENTS</h2>

        <?php
        if($result && mysqli_num_rows($result) > 0){
        $i = 1; // Initialize counter
        
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-md-2">
                <input type="text" class="form-control" id="usn<?php echo $i; ?>" value="<?php echo $row['usn']; ?>" name="usn<?php echo $i; ?>" >
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" id="name<?php echo $i; ?>" value="<?php echo $row['name']; ?>" name="name<?php echo $i; ?>">
            </div>
            <div class="col-md-2">
                <input type="number" class="form-control" id="sem<?php echo $i; ?>"value="<?php echo $row['sem']; ?>" name="sem<?php echo $i; ?>">
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" id="mentor<?php echo $i; ?>" value="<?php echo $row['mentor']; ?>" name="mentor<?php echo $i; ?>">
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-primary" name="update<?php echo $i; ?>">Update</button>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-danger" name="delete<?php echo $i; ?>">Delete</button>
            </div>
        <?php 
     $i++;
    }   
} else{
         $message = "No records found.";
    }
    ?>
    </form>
</div>
<?php
    // Check if the form was submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        for ($j = 1; $j < $i; $j++) {
            //Check if it's an update operation
            if(isset($_POST['update'.$j])) {
                $usn=$_POST['usn'.$j];
                $name=$_POST['name'.$j];
                $sem=$_POST['sem'.$j];
                $mentor=$_POST['mentor'.$j];

                $sql= "UPDATE student set usn = '$usn', name = '$name', sem = $sem, mentor = '$mentor' where usn = '$usn'";

                $n_result=mysqli_query($conn,$sql); 

                if ($n_result) {
                    echo '<div class="alert alert-success"><b>Student Details Updated Successfully.</b></div>';
                } else {
                    echo '<div class="alert alert-danger"><b>Error: Unable to update student details.</b></div>';
                }
            }
        }
        
             for ($j = 1; $j < $i; $j++) {
            // Check if it's a delete operation for this specific row
            if (isset($_POST['delete' . $j])) {
                $usn = $_POST['usn' . $j];

                $sql = "DELETE FROM student WHERE usn = '$usn'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo '<div class="alert alert-success"><b>Student Details Deleted Successfully.</b></div>';
                } else {
                    echo '<div class="alert alert-danger"><b>Error: Unable to delete student details.</b></div>';
                }
            }
    }
}
mysqli_close($conn); ?>

<?php
        include('connection.php');
        $message = '';  // Variable to store the message

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upload'])){
            $n_usn = $_POST['n_usn'];
            $n_name = $_POST['n_name'];
            $n_sem = $_POST['n_sem'];
            $n_mentor = $_POST['n_mentor'];
              
            // Check if the 'usn' already exists
            $checkSql = "SELECT * FROM `student` WHERE `usn`='$n_usn'";
            $checkResult = mysqli_query($conn, $checkSql);
//             if (!$checkResult) {
//     // Handle query error
//     echo "Error: " . mysqli_error($conn);
// } else {
//     // Continue with your code
// }

            if (mysqli_num_rows($checkResult) > 0) {
                // Set the message if 'usn' already registered
                    $smessage = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                 Already Enrolled with USN: '.$n_usn.'.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                          } else {
                              $sql = "INSERT INTO `student` (`usn`, `name`, `sem`, `mentor`) VALUES ('$n_usn', '$n_name', '$n_sem', '$n_mentor')";
                              $result = mysqli_query($conn, $sql);

                              $courses = array("evs", "atc", "cn", "dbms", "aiml", "csharp", "dbmslab", "rm");
                              $arrayLength = count($courses);
                              for($i=0; $i<$arrayLength; $i++){
                                $querry = "INSERT into $courses[$i] (`usn`) values ('$n_usn')";
                                $op = mysqli_query($conn, $querry);
                              }


                              if($result){
                                $smessage = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>SUCCESS!</strong> Enrolled new student with USN: '.$n_usn.'.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                              }
                          }
                        }
                        ?>
<div class="container fluid">
    <form method="POST" class="row g-3 my-3" action="/DBMS/bootstrap-5.3.2-dist/admin_student_details.php">
        <h2 class="p-2">ENROLL NEW STUDENT</h2>
        <div class="col-md-2">
            <input type="text" class="form-control" name="n_usn" placeholder="USN" required>
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" name="n_name" placeholder="Name" required>
        </div>
        <div class="col-md-2">
            <input type="number" class="form-control" name="n_sem"  placeholder="Sem" required>
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" name="n_mentor" placeholder="Mentor" required>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary" name="upload">Upload</button>
        </div>
    </form>

    <?php echo $smessage; ?>
</div>

<?php 
mysqli_close($conn);



// Function to retrieve student details from the database
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

include('footer.php');
?>



























