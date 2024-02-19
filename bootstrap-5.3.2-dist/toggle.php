<?php 
include('header.php');
include('navigation.php'); 
include('connection.php'); ?>
<img src="bg2.png" class="bg" alt="">

<?php
// Start session
session_start();

// Check if the session variable is set
if(isset($_SESSION['usn'])) {
    // Retrieve the USN from the session variable
    $usn = $_SESSION['usn'];
    // Now you can use $usn as needed
    // echo "Welcome! Your USN is: " . $usn;
} else {
    // Handle the case when the session variable is not set
    echo "Session variable not set!";
}

mysqli_close($conn);

$sql = "SELECT a.ia1 as ATC_IA1, a.ia2 as ATC_IA2, a.ia3 as ATC_IA3, a.ass as ATC_ASS, a.cie as ATC_CIE, a.see as ATC_SEE, a.total as ATC_TOTAL,
		b.ia1 as CN_IA1, b.ia2 as CN_IA2, b.ia3 as CN_IA3, b.ass as CN_ASS, b.cie as CN_CIE, b.see as CN_SEE, b.total as CN_TOTAL,
        c.ia1 as DBMS_IA1, c.ia2 as DBMS_IA2, c.ia3 DBMS_IA3, c.ass as DBMS_ASS, c.cie as DBMS_CIE, c.see as DBMS_SEE, c.total as DBMS_TOTAL,
        d.ia1 as AIML_IA1, d.ia2 as AIML_IA2, d.ia3 as AIML_IA3, d.ass as AIML_ASS, d.cie as AIML_CIE, d.see as AIML_SEE, d.total as AIML_TOTAL,
        e.ia1 as DBMSLAB_IA1, e.ia2 as DBMSLAB_IA2, e.ia3 as DBMSLAB_IA3, e.ass as DBMSLAB_ASS, e.cie as DBMSLAB_CIE, e.see as DBMSLAB_SEE, e.total as DBMSLAB_TOTAL,
        f.ia1 as RM_IA1, f.ia2 as RM_IA2, f.ia3 as RM_IA3, f.ass as RM_ASS, f.cie as RM_CIE, f.see as RM_SEE, f.total as RM_TOTAL,
        g.ia1 as EVS_IA1, g.ia2 as EVS_IA2, g.ia3 as EVS_IA3, g.ass as EVS_ASS, g.cie as EVS_CIE, g.see as EVS_SEE, g.total as EVS_TOTAL,
        h.ia1 as CSHARP_IA1, h.ia2 as CSHARP_IA2, h.ia3 as CSHARP_IA3, h.ass as CSHARP_ASS, h.cie as CSHARP_CIE, h.see as CSHARP_SEE, h.total as CSHARP_TOTAL
		from atc a, cn b, dbms c, aiml d, dbmslab e, rm f, evs g, csharp h 
        where a.usn = '$usn' 
			AND b.usn = '$usn' 
			AND c.usn = '$usn'
			AND d.usn = '$usn' 
			AND e.usn = '$usn' 
			AND f.usn = '$usn' 
			AND g.usn = '$usn' 
			AND h.usn = '$usn'";

     include('connection.php');

    $result = mysqli_query($conn, $sql);
        $n = mysqli_num_rows($result);
        

    // Close the database connection
    mysqli_close($conn);
        

?>

<div class="container-fluid text-center p-3 my-5 rounded">
     <div class="row ">
        <div class="col-lg-2 col-md-3 col-sm-4 p-3 shadow-lg">
            <form method="post" action="">
            <button type="submit" class="btn btn-dark custom-btn mt-2 mb-2"  name="action" value="atc" >ATC</button><br>
            <button type="submit" class="btn btn-dark custom-btn mt-2 mb-2" name="action" value="cn" >CN</button><br>
            <button type="submit" class="btn btn-dark custom-btn mt-2 mb-2"  name="action" value="dbms">DBMS</button><br>
            <button type="submit" class="btn btn-dark custom-btn mt-2 mb-2"  name="action" value="aiml">AIML</button><br>
            <button type="submit" class="btn btn-dark custom-btn mt-2 mb-2"  name="action" value="dbmslab">DBMS Lab</button><br>
            <button type="submit" class="btn btn-dark custom-btn mt-2 mb-2"  name="action" value="rm">RM</button><br>
            <button type="submit" class="btn btn-dark custom-btn mt-2 mb-2"  name="action" value="evs">EVS</button><br>
            <button type="submit" class="btn btn-dark custom-btn mt-2 mb-2"  name="action" value="csharp">C#</button><br>
            <button type="submit" class="btn btn-dark custom-btn mt-2 mb-2" name="action" value="report">Report</button><br>   
        </form>
        </div>

         <div class="col-lg-9 col-md-9 col-sm-8 shadow-lg p-3 bg-body-tertiary rounded" id="rightColumn" >
        
        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        // Perform action based on the button clicked
        switch ($action) {
            case 'atc':
                // Handle ATC action
                // You can include the corresponding PHP code here
                break;
            case 'cn':
                // Handle CN action
                break;
            // Add cases for other actions...

            case 'report':
                // Include the PHP code for generating the report
                include('report_content.php');
                break;

            default:
                // Handle unknown action
                break;
        }
    }
}?>
               
</div>
</div> 
</div>

<?php include('footer.php'); ?>

