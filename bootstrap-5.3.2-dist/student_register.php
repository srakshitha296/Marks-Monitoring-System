<!--Include the header -->
<?php include('header.php'); ?>

<!--Include the navigation bar -->
<?php include('navigation.php'); ?>

<img class="bg" src="bg2.png" alt="">
<div class="container px-3 ">
    <div class="row gx-5">
        <div class="col">
            <div class="p-3 centre">
              <div class="container mt-5">
                <div class="row justify-content-center">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="text-center">Register</h3>
                      </div>
                      <div class="card-body">
                        <?php
                        include('connection.php');

                        // if(!$conn){
                        //   die ("Connection unsuccessful: ".mysqli_connect_error());
                        // }
                        // echo "Connection successful";

                        $message = '';  // Variable to store the message

                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                          $name = $_POST['name'];
                          $usn = $_POST['usn'];
                          $password = $_POST['password'];

                          // Check if the 'usn' already exists
                          $checkSql = "SELECT * FROM `student_registration` WHERE `usn`='$usn'";
                          $checkResult = mysqli_query($conn, $checkSql);

                          if (mysqli_num_rows($checkResult) > 0) {
                              // Set the message if 'usn' already registered
                              $message = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                 Already Registered with USN: '.$usn.'.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                          } else {
                              $sql = "INSERT INTO `student_registration`(`usn`, `name`, `password`) VALUES ('$usn','$name','$password')";
                              $result = mysqli_query($conn, $sql);

                              if($result){
                                $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>SUCCESS!</strong> Registered successfully with USN: '.$usn.'.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                              }
                          }
                        }
                        ?>

                        <form method="post" action="/DBMS/bootstrap-5.3.2-dist/student_register.php">
                          <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input name ="name" type="text" class="form-control" id="name" placeholder="Enter your Name" required>
                          </div>
                          <div class="mb-3">
                            <label for="usn" class="form-label">USN:</label>
                            <input name ="usn" type="text" class="form-control" id="usn" placeholder="USN" required>
                          </div>
                          <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password" required>
                          </div>
                          <button type="submit" class="btn btn-success btn-block">Register</button>
                        </form>

                        <!-- Display the message within the card -->
                        <?php echo $message; ?>

                        <p class="mt-3 text-center">Already have an account? <a href="student_login.php" onclick="showLoginForm()">Login</a></p>
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
