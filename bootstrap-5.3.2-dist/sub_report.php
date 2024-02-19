<?php   include('header.php');
        include('connection.php');
        
        if(isset($_SESSION['course'])){
            $table_name = $_SESSION['course'];
        }else{
            echo "Session variable not set!";
        }

        $sql = "SELECT * from $table_name where usn = '$usn'";
        $result = mysqli_query($conn, $sql);
?>

<div class="container-fluid">
    <form>
        <?php 
            while($row = mysqli_fetch_assoc($result)){ ?>
        <div class="row g-3 mb-3">
            <label for="ia1" class="col-sm-2 col-form-label">IA 1</label>
            <div class="col-sm-4 col-md-4">
                <input type="number" class="form-control" id="ia1" value=<?php echo $row['ia1']; ?> readonly>
            </div>
        </div>

        <div class="row mb-3">
            <label for="ia2" class="col-sm-2 col-form-label">IA 2</label>
            <div class="col-sm-4 col-md-4">
                <input type="number" class="form-control" id="ia2" value=<?php echo $row['ia2']; ?> readonly>
            </div>
        </div>

        <div class="row mb-3">
            <label for="ia3" class="col-sm-2 col-form-label">IA 3</label>
            <div class="col-sm-4 col-md-4">
                <input type="number" class="form-control" id="ia3" value=<?php echo $row['ia3']; ?> readonly>
            </div>
        </div>

        <div class="row mb-3">
            <label for="ass" class="col-sm-2 col-form-label">Assignment</label>
            <div class="col-sm-4 col-md-4">
                <input type="number" class="form-control" id="ass" value=<?php echo $row['ass']; ?> readonly>
            </div>
        </div>

        <div class="row mb-3">
            <label for="cie" class="col-sm-2 col-form-label">Total Internal Marks</label>
            <div class="col-sm-4 col-md-4">
                <input type="number" class="form-control" id="cie" value=<?php echo $row['cie']; ?> readonly>
            </div>
        </div>

        <div class="row mb-3">
            <label for="see" class="col-sm-2 col-form-label">External Marks</label>
            <div class="col-sm-4 col-md-4">
                <input type="number" class="form-control" id="see" value=<?php echo $row['see']; ?> readonly>
            </div>
        </div>

        <div class="row mb-3">
            <label for="total" class="col-sm-2 col-form-label">Total</label>
            <div class="col-sm-4 col-md-4">
            <input type="number" class="form-control" id="see" value=<?php echo $row['total']; ?> readonly>
            </div>
        </div>
        <?php } ?>
    </form>
      
