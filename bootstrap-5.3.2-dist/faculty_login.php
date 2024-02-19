<?php include('header.php'); ?>
<?php include('navigation.php'); ?>

<img src="adminbg.jpg" alt="" class="bg">

<div class="container-fluid p-5">
  <div class="row justify-content-center"> <!-- Wrap the form in a row -->
    <div class="col-md-6"> <!-- Define column width for medium devices (desktops) -->
      <div class="container my-5 shadow-lg p-5 bg-body rounded">
        <h3 class="text-center">Sign in</h3>
        <form method="post" action="/DBMS/bootstrap-5.3.2-dist/faculty_login.php">
          <div class="my-3">
            <?php
                // Check if form is submitted
                $message = " ";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve form data
                $sub_code = $_POST["sub_code"];
                $password = $_POST["password"];

                // Add your database connection logic here
                // Check if the student is registered in the database
                $isRegistered = checkFacultyInfo($sub_code, $password);

                                        if($isRegistered==2){
                                          //Incorrect Password
                                          $message = '<p class="text-danger">Incorrect password.</p>';
                                        }
                                        else if ($isRegistered==true) {
                                          $message = "";
                                            // course is registered
                                            $message = '<p class="text-success">Login successful!</p>';
                                        }
                                        else {
                                            // Course doesnt exist
                                            $message = '<p class="text-danger">Couse doesnt exist.</p>';
                                        }
                                    }
                                    ?>
            <label for="sub_code" class="form-label">Subject Code:</label>
            <input name="sub_code" type="text" class="form-control" id="sub_code" placeholder="Enter Course code" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password" required>
          </div>
          <button type="submit" class="btn btn-success btn-block">Login</button>
          <?php echo $message; ?>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>

<?php
// Function to check if the Faculty is registered in the database
function checkFacultyInfo($sub_code, $password)
{
    // echo " Entered Password: $password";
    $enteredPassword = $password;
    include('connection.php');

    // Add your database query logic here
    $sql = "SELECT * FROM `course` WHERE `courseid`='$sub_code'";
    $result = mysqli_query($conn, $sql);
    

    if (!$result) {
        // If there's an error in the query, display the error
        echo " Error: " . mysqli_error($conn);
        mysqli_close($conn);
        return false;
    }

    if (mysqli_num_rows($result) > 0) {
        // Student is registered
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password'];
        $storedsub_code = $row['courseid'];

        // Display the entered and stored passwords
        //echo " Stored Password: $storedsub_code";
        // echo " Entered Password: $enteredPassword";

        // Compare the entered and stored passwords directly
        if (trim($enteredPassword) == trim($storedPassword)) {
            // Passwords match, login successful
            mysqli_close($conn);
            // echo " Passwords match!";

            // Start session
            session_start();

            // Assuming $sub_code contains the code of the logged-in user
            $pass_code = $sub_code;

            // Store the USN in a session variable
            $_SESSION['sub_code'] = $pass_code;

            // Redirect to another page
            header("Location: update_marks.php");
            exit; // Make sure to exit after redirection

        } else if(trim($storedsub_code) != trim($sub_code)){
            // no such subject in this sem
            mysqli_close($conn);
            return false;
        }
    } else{
            // Passwords don't match
            mysqli_close($conn);
            // echo " Passwords don't match!";
            return 2;
       
    }
}
?>

