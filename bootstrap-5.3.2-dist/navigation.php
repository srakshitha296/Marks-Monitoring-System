<nav class="navbar navbar-expand-lg bg-body-tertiary ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i><b>MarksMonitor</b></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle show" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            LogIn as
          </a>
          <!--Removed class show below-->
          <ul class="dropdown-menu" data-bs-popper="static">
            <li><a class="dropdown-item" href="admin_login.php">Admin</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="faculty_login.php">Faculty</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="student_login.php">Student</a></li>
          </ul>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>



    