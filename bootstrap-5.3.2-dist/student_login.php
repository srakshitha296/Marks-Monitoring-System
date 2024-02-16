<!--Include the header -->
<?php include('header.php'); ?>

<!--Include the navigation bar -->
<?php include('navigation.php'); ?>

<img class="bg" src="bg2.png" alt="">

<div class="container px-4 ">
    <div class="row gx-5">
        <div class="col">
            <div class="p-2 centre">
              <div class="container mt-1">
                <div class="row justify-content-center">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="text-center">Login</h3>
                      </div>
                      <div class="card-body">
                         <?php
                                    // Check if form is submitted
                                    $message = " ";
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        // Retrieve form data
                                        $usn = $_POST["usn"];
                                        $password = $_POST["password"];

                                        // Add your database connection logic here
                                        // Check if the student is registered in the database
                                        $isRegistered = checkStudentRegistration($usn, $password);

                                        if($isRegistered==2){
                                          //Incorrect Password
                                          $message = '<p class="text-danger">Incorrect password.</p>';
                                        }
                                        else if ($isRegistered==true) {
                                          $message = "";
                                            // Student is registered, perform login logic
                                            $message = '<p class="text-success">Login successful!</p>';
                                        }
                                        else {
                                            // Student is not registered
                                            $message = '<p class="text-danger">Not yet registered ? </p>';
                                        }
                                    }
                                    ?>
                        <form method="post" action="/DBMS/bootstrap-5.3.2-dist/student_login.php">
                          <div class="mb-3">
                            <label for="usn" class="form-label">USN:</label>
                            <input name ="usn" type="text" class="form-control" id="usn" placeholder="Enter your usn (USN)" required>
                          </div>
                          <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password" required>
                          </div>
                          <button type="submit" class="btn btn-success btn-block">Login</button>
                          <?php echo $message; ?>
                        </form>
                        <p class="mt-3 text-center"><a href="student_register.php" onclick="showRegisterForm()">Register</a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                </div>
            </div>
        </div>
    </div>
<!--End with the footer-->
<?php include('footer.php'); ?>

<?php
// Function to check if the student is registered in the database
function checkStudentRegistration($usn, $password)
{
    // echo " Entered Password: $password";
    $enteredPassword = $password;
    include('connection.php');

    // Add your database query logic here
    $sql = "SELECT * FROM `student_registration` WHERE `usn`='$usn'";
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

        // Display the entered and stored passwords
        // echo " Stored Password: $storedPassword";
        // echo " Entered Password: $enteredPassword";

        // Compare the entered and stored passwords directly
        if (trim($enteredPassword) == trim($storedPassword)) {
            // Passwords match, login successful
            mysqli_close($conn);
            // echo " Passwords match!";


            // Start session
            session_start();

            // Assuming $usn contains the USN of the logged-in user
            $pass_usn = $usn;

            // Store the USN in a session variable
            $_SESSION['usn'] = $pass_usn;

            // Redirect to another page
            header("Location: trial1.php");
            exit; // Make sure to exit after redirection

        } else {
            // Passwords don't match
            mysqli_close($conn);
            // echo " Passwords don't match!";
            return 2;
        }
    } else {
        // Student is not registered
        mysqli_close($conn);
        return false;
    }
}

?>
