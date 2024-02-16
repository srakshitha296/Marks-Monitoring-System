<?php 
include('header.php');
include('connection.php');

// Retrieve student details
$result = getStudentDetails();
$message = "";
$smessage = "";
$n_usn = "";
$n_name = "";
$n_sem = "";
$n_mentor = "";
if($result && mysqli_num_rows($result) > 0){
?>

<img src="aj2.jpg" alt="" class="img-fluid">

<div class="container-fluid">
    <div class="container top">
        <div class="d-grid gap-3 d-md-block my-5 mx-5 text-center ">
            <a  href="admin_student_details.php"><button  type="button" id="student" class="btn btn-outline-success btn-lg" type="button" onclick="updateBottum('student')">STUDENT</button></a>
            
            <button type="button" id="course" class="btn btn-outline-success btn-lg" type="button" onclick="updateBottum('course')">COURSE</button>
        </div>
    </div>
    <div class="container bottum " id="bottum">
        
    </div>
</div>

<div class="container">
    <form class="row g-3 my-3" method="POST">
        <h2 class="p-2">ENROLLED STUDENTS</h2>

        <?php
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
           
    // Check if the form was submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Check if it's an update operation
            if(isset($_POST['update'.$i])){

                if (isset($_POST['usn'.$i], $_POST['name'.$i], $_POST['sem'.$i], $_POST['mentor'.$i])) {
                $usn=$_POST['usn'.$i];
                $name=$_POST['name'.$i];
                $sem=$_POST['sem'.$i];
                $mentor=$_POST['mentor'.$i];

                $sql= "UPDATE student set usn = '$usn', name = '$name', sem = $sem, mentor = '$mentor' where usn = '$usn'";

                $n_result=mysqli_query($conn,$sql); 

                if ($n_result) {
                    echo '<div class="alert alert-success"><b>Student Details Updated Successfully.</b></div>';
                } else {
                    echo '<div class="alert alert-danger"><b>Error: Unable to update student details.</b></div>';
                }
            }
            }

            // Check if it's a delete operation for this specific row
            if (isset($_POST['delete' . $i])) {
                $usn = $_POST['usn' . $i];

                $sql = "DELETE FROM student WHERE usn = '$usn'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo '<div class="alert alert-success"><b>Student Details Deleted Successfully.</b></div>';
                } else {
                    echo '<div class="alert alert-danger"><b>Error: Unable to delete student details.</b></div>';
                }
            }
    }
        $i++;
}
?> 
<?php echo $message; ?>
 <?php } else{
         $message = "No records found.";
    }
    ?>
    </form>
   

    <?php
        include('connection.php');
        $message = '';  // Variable to store the message

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
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

                              if($result){
                                $smessage = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>SUCCESS!</strong> Enrolled new student with USN: '.$n_usn.'.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                              }
                          }
                        }
                        ?>
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



























