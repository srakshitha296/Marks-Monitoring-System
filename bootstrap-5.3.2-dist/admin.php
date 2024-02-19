<?php include("header.php"); ?>
<?php include("navigation.php"); ?>

<img class="bg" src="cropped.png" alt=""> 

<h2 class="text-center my-4 ">Admin</h2>

<div class="container-fluid">
    <div class="container top">
        <img src="adminbg.jpg" class="img-fluid mb-4" alt="...">
        <h3 class="text-center"><i>View Details</i></h3>
        <div class="d-grid gap-3 d-md-block mb-4 mx-5 text-center ">
            <a  href="admin_student_details.php"><button  type="button" id="student" class="btn btn-success btn-lg" type="button" onclick="updateBottum('student')">STUDENT</button></a>
            
            <button type="button" id="course" class="btn btn-success btn-lg" type="button" onclick="updateBottum('course')">COURSE</button>
        </div>
    </div>
    <div class="container bottum " id="bottum">
        
    </div>
</div>

<?php include('footer.php'); ?>


