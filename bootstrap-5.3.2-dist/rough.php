
      


<?php include 'header.php';
?>
</div>
<div id="sidebar">
<?php 
$active="contact";
 include 'sidebar.php'; ?>

</div>
<div id="content">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 lg-12 sm-12">

          <h1 class="page-title">Update Contact Info</h1>
        </div>
      </div>
      <hr>
      <?php if(isset($_POST['update']))
      {
        $address=$_POST['address'];
        $number=$_POST['email'];
        $email=$_POST['contactno'];
        $conn=mysqli_connect("localhost","root","","blood_donation") or die("Connection error");
        $sql= "update contact_info set contact_address='{$address}', contact_mail='{$email}', contact_phone='{$number}' where contact_id='1'";
        $result=mysqli_query($conn,$sql) or die("query unsuccessful.");
      echo '<div class="alert alert-success"><b>Contact Details Updated Successfully.</b></div>';

        mysqli_close($conn);
      }
      ?>

<div class="row">
        <div class="col-md-10">
          <div class="panel panel-default">
            <div class="panel-heading">Contact Details</div>
            <div class="panel-body">
              <form method="post"  name="change_contact" class="form-horizontal">

      <div class="form-group">
                  <label class="col-sm-4 control-label"> Address</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" name="address" id="address" required></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"> Email id</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" name="email" id="email" value="" required>
                  </div>
                </div>
      <div class="form-group">
                  <label class="col-sm-4 control-label"> Contact Number </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" value="" name="contactno" id="contactno" required>
                  </div>
                </div>

                <div class="hr-dashed"></div>




                <div class="form-group">
                  <div class="col-sm-8 col-sm-offset-4">

                    <button class="btn btn-primary" name="update" type="submit">Update</button>
                  </div>
                </div>

              </form>

            </div>
          </div>
        </div>

      </div>


        </div>
      </div>
    </div>
  <?php
 } else {
     echo '<div class="alert alert-danger"><b> Please Login First To Access Admin Portal.</b></div>';
     ?>
     <form method="post" name="" action="login.php" class="form-horizontal">
       <div class="form-group">
         <div class="col-sm-8 col-sm-offset-4" style="float:left">

           <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
         </div>
       </div>
     </form>
 <?php }
  ?>



<!-- dumbuda student d admin undata ita form -->
<?php include('header.php'); ?>

<div class="container">
    <form class="row g-3">
<?php $i = 10;
    while($i>0){
    ?>
        <div class="col-md-2">
            <!-- <label for="usn" class="form-label">USN</label> -->
            <input type="text" class="form-control" id="usn" placeholder="USN">
        </div>
        <div class="col-md-2">
            <!-- <label for="name" class="form-label">Name</label> -->
            <input type="text" class="form-control" id="name" placeholder="Name">
        </div>
        <div class="col-md-2">
            <!-- <label for="sem" class="form-label">Sem</label> -->
            <input type="number" class="form-control" id="sem" placeholder="Sem">
        </div>
        <div class="col-md-2">
            <!-- <label for="mentor" class="form-label">Mentor</label> -->
            <input type="text" class="form-control" id="mentor"  placeholder="Mentor">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Delete</button>
        </div>
        <!-- <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div> -->
    <?php 
    $i = $i-1;
}
    ?>
    </form>
</div>
    

<?php include('footer.php'); ?>


<!-- admin  -->
<?php
// Include the database connection file
include('connection.php');

// Function to retrieve student details from the database
function getStudentDetails() {
    global $conn;
    // Write your SQL query to retrieve student details
    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);
    // Check if query was successful
    if ($result) {
        // Fetch data and return it
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        // Handle query error
        return [];
    }
}

// Function to update student details in the database
function updateStudentDetails($studentId, $newDetails) {
    global $conn;
    // Write your SQL query to update student details
    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE students SET name=?, sem=?, mentor=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $newDetails['name'], $newDetails['sem'], $newDetails['mentor'], $studentId);
    $result = mysqli_stmt_execute($stmt);
    // Check if update was successful
    if ($result) {
        return true;
    } else {
        // Handle update error
        return false;
    }
}

// Function to delete student from the database
function deleteStudent($studentId) {
    global $conn;
    // Write your SQL query to delete student
    $sql = "DELETE FROM students WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $studentId);
    $result = mysqli_stmt_execute($stmt);
    // Check if delete was successful
    if ($result) {
        return true;
    } else {
        // Handle delete error
        return false;
    }
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if it's an update operation
    if (isset($_POST['update'])) {
        $studentId = $_POST['student_id'];
        $newDetails = [
            'name' => $_POST['name'],
            'sem' => $_POST['sem'],
            'mentor' => $_POST['mentor']
        ];
        // Call update function
        $success = updateStudentDetails($studentId, $newDetails);
        if ($success) {
            // Handle successful update
        } else {
            // Handle update failure
        }
    }
    // Check if it's a delete operation
    elseif (isset($_POST['delete'])) {
        $studentId = $_POST['student_id'];
        // Call delete function
        $success = deleteStudent($studentId);
        if ($success) {
            // Handle successful delete
        } else {
            // Handle delete failure
        }
    }
}

// Retrieve student details
$students = getStudentDetails();

// Close the database connection
mysqli_close($conn);
?>




<!-- vvvvvvip -->
<?php include('header.php'); ?>
<img src="adminbg.jpg" class="img-fluid" alt="...">
<?php include('connection.php');

// Retrieve student details
$result = getStudentDetails();
$output = $result;
if($result){
?>


<div class="container">
    <form class="row g-3 my-3" method="POST">
    <h2 class="p-2">ENROLLED STUDENTS</h2>

    <?php
    $i = 1; // Initialize counter
    
    while ($row = mysqli_fetch_assoc($output)) {
    ?>
        <div class="col-md-2">
            <input type="text" class="form-control" id="usn<?php echo $i; ?>" value="<?php echo $row['usn']; ?>" name="usn<?php echo $i; ?>">
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" id="name<?php echo $i; ?>" value="<?php echo $row['name']; ?>" name="name<?php echo $i; ?>">
        </div>
        <div class="col-md-2">
            <input type="number" class="form-control" id="sem<?php echo $i; ?>" value="<?php echo $row['sem']; ?>" name="sem<?php echo $i; ?>">
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
        //Check if the form was submitted
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //Check if it's an update operation
            if(isset($_POST['update'.$i])){
                $usn=$_POST['usn'.$i];
                $name=$_POST['name'.$i];
                $sem=$_POST['sem'.$i];
                $mentor=$_POST['mentor'.$i];

                $sql= "UPDATE student set usn = '$usn', name = '$name', sem = $sem, mentor = '$mentor' where usn = '$usn'";

                $result=mysqli_query($conn,$sql) or die("query unsuccessful.");

                if ($result) {
                    echo '<div class="alert alert-success"><b>Student Details Updated Successfully.</b></div>';
                } else {
                    echo '<div class="alert alert-danger"><b>Error: Unable to update student details.</b></div>';
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
        ?>
    <?php
        $i++; // Increment counter
    }
    ?>
</form>

    <?php
        include('connection.php');
        $message = '';  // Variable to store the message

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $n_usn = $_POST['usn'];
            $n_name = $_POST['name'];
            $n_sem = $_POST['sem'];
            $n_mentor = $_POST['mentor'];
              
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
                    $message = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                 Already Enrolled with USN: '.$n_usn.'.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                          } else {
                              $sql = "INSERT INTO `student` (`usn`, `name`, `sem`, `mentor`) VALUES ('$n_usn', '$n_name', '$n_sem', '$n_mentor')";
                              $result = mysqli_query($conn, $sql);

                              if($result){
                                $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>SUCCESS!</strong> Enrolled new student with USN: '.$n_usn.'.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                              }
                          }
                        }
                    }else{
                        echo "Failed to retrieve details.";
                    }
                        ?>
    <form method="POST" class="row g-3 my-3" action="/DBMS/bootstrap-5.3.2-dist/admin_student_details.php">
        <h2 class="p-2">ENROLL NEW STUDENT</h2>
        <div class="col-md-2">
            <input type="text" class="form-control" name="usn" placeholder="USN" required>
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" name="name" placeholder="Name" required>
        </div>
        <div class="col-md-2">
            <input type="number" class="form-control" name="sem" placeholder="Sem" required>
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" name="mentor" placeholder="Mentor" required>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Upload</button>
        </div>
        <?php 
            if(isset($_POST['']))
        ?>
    </form>

    <?php echo $message; ?>
</div>

<?php 


//close the connection
mysqli_close($conn);

// Function to retrieve student details from the database
function getStudentDetails() {
    global $conn;
    $sql = "SELECT * FROM student";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        echo "Error: ". mysqli_error($conn);
        return false;
    }
}


include('footer.php'); 
?>



// Function to retrieve student details from the database
function getStudentMarks() {

// Start session
session_start();

// Check if the session variable is set
if(isset($_SESSION['usn'])) {
    // Retrieve the USN from the session variable
    $usn = $_SESSION['usn'];
    // Now you can use $usn as needed
    echo "Welcome! Your USN is: " . $usn;
} else {
    // Handle the case when the session variable is not set
    echo "Session variable not set!";
}


    global $conn;

    $sql = 'SELECT a.ia1, a.ia2, a.ia3, a.ass, a.cie, a.see, a.total,
		b.ia1, b.ia2, b.ia3, b.ass, b.cie, b.see, b.total,
        c.ia1, c.ia2, c.ia3, c.ass, c.cie, c.see, c.total,
        d.ia1, d.ia2, d.ia3, d.ass, d.cie, d.see, d.total,
        e.ia1, e.ia2, e.ia3, e.ass, e.cie, e.see, e.total,
        f.ia1, f.ia2, f.ia3, f.ass, f.cie, f.see, f.total,
        g.ia1, g.ia2, g.ia3, g.ass, g.cie, g.see, g.total,
        h.ia1, h.ia2, h.ia3, h.ass, h.cie, h.see, h.total
		from atc a, cn b, dbms c, aiml d, dbmslab e, rm f, evs g, csharp h 
        where a.usn = "4JK21CS048" 
			AND b.usn = "4JK21CS048" 
			AND c.usn = "4JK21CS048" 
			AND d.usn = "4JK21CS048" 
			AND e.usn = "4JK21CS048" 
			AND f.usn = "4JK21CS048" 
			AND g.usn = "4JK21CS048" 
			AND h.usn = "4JK21CS048"';

    $result = mysqli_query($conn, $sql);

    if($result = mysqli_query($conn, $sql) > 0) {
        return $result;
    } else {
        echo "Error: ". mysqli_error($conn);
        return false;
    }
    mysqli_close($conn);
}


include('footer.php'); 
?>

