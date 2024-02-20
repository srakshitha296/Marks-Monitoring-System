<?php 
include('header.php');
include('navigation.php');
include('connection.php');

// Start session
session_start();

// Check if the session variable is set
if(isset($_SESSION['sub_code'])) {
    // Retrieve the subject code from the session variable
    $sub_code = $_SESSION['sub_code'];
    // echo "Welcome! Your subject code is: " . $sub_code;
} else {
    // Handle the case when the session variable is not set
    echo "Session variable not set!";
}

 switch ($sub_code) {
        case '21CIV57':
            $table_name = 'evs';
            break;
        case '21CS51':
            $table_name = 'atc';
            break;
        case '21CS52':
            $table_name = 'cn';
            break;
        case '21CS53':
            $table_name = 'dbms';
            break;
        case '21CS54':
            $table_name = 'aiml';
            break;
        case '21CS582':
            $table_name = 'csharp';
            break;
        case '21CSL55':
            $table_name = 'dbmslab';
            break;
        case '21RMI56':
            $table_name = 'rm';
            break;
    }

// Retrieve student details
$result = getStudentMarks($table_name);
?>

<img src="bg2.png" alt="" class="bg">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2 text-end">
            <a href="home.php"><button type="submit" class="btn btn-danger mt-2">Log Out</button></a>
        </div>
    </div>
</div>
<div class="container">
    <form class="row g-3 " method="POST">
        <h2 class="p-2 mb-5 text-center"><?php echo $sub_code; ?></h2>
        <div class="col-md-2"><h4>USN</h4></div>
        <div class="col-md-1"><h4>IA 1</h4></div>
        <div class="col-md-1"><h4>IA 2</h4></div>
        <div class="col-md-1"><h4>IA 3</h4></div>
        <div class="col-md-1"><h4>A/Q/S</h4></div>
        <div class="col-md-1"><h4>Internal</h4></div>
        <div class="col-md-1"><h4>External</h4></div>
        <div class="col-md-1"><h4>Total</h4></div>
        <div class="col-md-2"><h4>Update</h4></div>
        <?php
        if($result && mysqli_num_rows($result) > 0){
        $i = 1; 
        
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-md-2">
                <input type="text" class="form-control" id="usn<?php echo $i; ?>" value="<?php echo $row['usn']; ?>" name="usn<?php echo $i; ?>" >
            </div>
            <div class="col-md-1">
                <input type="number" class="form-control" id="ia1<?php echo $i; ?>" value="<?php echo $row['ia1']; ?>" name="ia1<?php echo $i; ?>">
            </div>
            <div class="col-md-1">
                <input type="number" class="form-control" id="ia2<?php echo $i; ?>" value="<?php echo $row['ia2']; ?>" name="ia2<?php echo $i; ?>">
            </div>
            <div class="col-md-1">
                <input type="number" class="form-control" id="ia3<?php echo $i; ?>" value="<?php echo $row['ia3']; ?>" name="ia3<?php echo $i; ?>">
            </div>
            <div class="col-md-1">
                <input type="number" class="form-control" id="ass<?php echo $i; ?>" value="<?php echo $row['ass']; ?>" name="ass<?php echo $i; ?>">
            </div>
            <div class="col-md-1">
                <input type="number" class="form-control" id="cie<?php echo $i; ?>" value="<?php echo $row['cie']; ?>" name="cie<?php echo $i; ?>">
            </div>
            <div class="col-md-1">
                <input type="number" class="form-control" id="see<?php echo $i; ?>" value="<?php echo $row['see']; ?>" name="see<?php echo $i; ?>">
            </div>
            <div class="col-md-1">
                <input type="number" class="form-control" id="total<?php echo $i; ?>" value="<?php echo $row['total']; ?>" name="total<?php echo $i; ?>">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary" name="update<?php echo $i; ?>">Update</button>
            </div>
        <?php   
$i++;
}
 } else{
         $message = "No records found.";
         echo $message;
    }
    ?>
    </form>
</div>
<?php 
// Check if the form was submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
         for ($j = 1; $j < $i; $j++) {
            //Check if it's an update operation
            if(isset($_POST['update'.$j])){
                $usn=$_POST['usn'.$j];
                $ia1=$_POST['ia1'.$j];
                $ia2=$_POST['ia2'.$j];
                $ia3=$_POST['ia3'.$j];
                $ass=$_POST['ass'.$j];
                $cie=$_POST['cie'.$j];
                $see=$_POST['see'.$j];
                $total=$_POST['total'.$j];

                $sql= "UPDATE $table_name set usn = '$usn', ia1 = '$ia1', ia2 = '$ia2', ia3 = '$ia3', ass = '$ass', cie = '$cie', see = '$see', total = '$total' where usn = '$usn'";

                $n_result=mysqli_query($conn,$sql); 

                if ($n_result) {
                    echo '<div class="alert alert-success"><b>Student Details Updated Successfully.</b></div>';
                } else {
                    echo '<div class="alert alert-danger"><b>Error: Unable to update student details.</b></div>';
                }
            }
        }
    }

mysqli_close($conn);



// Function to retrieve student details from the database
function getStudentMarks($table_name) {
    global $conn;
    $sql = "SELECT * FROM $table_name";
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

