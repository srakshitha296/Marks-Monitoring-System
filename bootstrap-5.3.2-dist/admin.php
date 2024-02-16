<?php include("header.php"); ?>
<?php include("navigation.php"); ?>

<img src="adminbg.jpg" class="img-fluid" alt="...">

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

<?php include('footer.php'); ?>


