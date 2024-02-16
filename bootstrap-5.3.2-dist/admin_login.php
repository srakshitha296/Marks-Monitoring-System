<?php include('header.php'); ?>
<?php include('navigation.php'); ?>

<img src="adminbg.jpg" alt="" class="bg">

<div class="container-fluid p-5">
  <div class="row justify-content-center"> <!-- Wrap the form in a row -->
    <div class="col-md-6"> <!-- Define column width for medium devices (desktops) -->
      <div class="container my-5 shadow-lg p-5 bg-body rounded">
        <h3 class="text-center">Admin</h3>
        <form method="post" action="/DBMS/bootstrap-5.3.2-dist/admin_login.php">
          <div class="my-3">
            <?php 
            $uname = "admin123";
            $pword = "123258";
            $message = " ";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              // Retrieve form data
              $username = $_POST["username"];
              $password = $_POST["password"];

              if($uname == $username and $pword == $password){
                header("Location: admin.php");
              }else if($uname != $username){
                $message = '<p class="text-danger">Incorrect username.</p>';
              }else{
                $message = '<p class="text-danger">Incorrect password.</p>';
              }
            }
            ?>
            <label for="username" class="form-label">Username:</label>
            <input name="username" type="text" class="form-control" id="username" placeholder="Enter your username" required>
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
