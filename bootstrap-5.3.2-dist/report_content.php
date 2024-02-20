
<?php include('connection.php');
        $query = "SELECT name from student where usn = '$usn'";
        $name = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($name)) { ?>
            <h4 class="text-center my-3"><?php echo $row['name']; ?></h4>
<?php } 
        mysqli_close($conn); 
?>

            <h4 class="text-center my-3"><?php echo $usn; ?></h1>
            <div class="table-responsive">
            <table class="table">
            <thead>
                 <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Course</th>
                    <th scope="col">IA 1</th>
                    <th scope="col">IA 2</th>
                    <th scope="col">IA 3</th>
                    <th scope="col">ASSIGNMENT</th>
                    <th scope="col">CIE</th>
                    <th scope="col">SIE</th>
                    <th scope="col">Total</th>
                    <th scope="col">Grade</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($rows = mysqli_fetch_assoc($result)){
                 ?>
                 <tr>
                    <th scope="row">21CS51</th>
                    <td>ATC</td>
                    <td><?php echo $rows['ATC_IA1']; ?></td>
                    <td><?php echo $rows['ATC_IA2']; ?></td>
                    <td><?php echo $rows['ATC_IA3']; ?></td>
                    <td><?php echo $rows['ATC_ASS']; ?></td>
                    <td><?php echo $rows['ATC_CIE']; ?></td>
                    <td><?php echo $rows['ATC_SEE']; ?></td>
                    <td><?php echo $rows['ATC_TOTAL']; ?></td>
                </tr>
                <tr>
                    <th scope="row">21CS52</th>
                    <td>CN</td>
                    <td><?php echo $rows['CN_IA1']; ?></td>
                    <td><?php echo $rows['CN_IA2']; ?></td>
                    <td><?php echo $rows['CN_IA3']; ?></td>
                    <td><?php echo $rows['CN_ASS']; ?></td>
                    <td><?php echo $rows['CN_CIE']; ?></td>
                    <td><?php echo $rows['CN_SEE']; ?></td>
                    <td><?php echo $rows['CN_TOTAL']; ?></td>
                </tr>
                <tr>
                    <th scope="row">21CS53</th>
                    <td>DBMS</td>
                    <td><?php echo $rows['DBMS_IA1']; ?></td>
                    <td><?php echo $rows['DBMS_IA2']; ?></td>
                    <td><?php echo $rows['DBMS_IA3']; ?></td>
                    <td><?php echo $rows['DBMS_ASS']; ?></td>
                    <td><?php echo $rows['DBMS_CIE']; ?></td>
                    <td><?php echo $rows['DBMS_SEE']; ?></td>
                    <td><?php echo $rows['DBMS_TOTAL']; ?></td>
                </tr>
                <tr>
                    <th scope="row">21CS54</th>
                    <td>AIML</td>
                    <td><?php echo $rows['AIML_IA1']; ?></td>
                    <td><?php echo $rows['AIML_IA2']; ?></td>
                    <td><?php echo $rows['AIML_IA3']; ?></td>
                    <td><?php echo $rows['AIML_ASS']; ?></td>
                    <td><?php echo $rows['AIML_CIE']; ?></td>
                    <td><?php echo $rows['AIML_SEE']; ?></td>
                    <td><?php echo $rows['AIML_TOTAL']; ?></td>
                </tr>
                <tr>
                    <th scope="row">21CSL55</th>
                    <td>DBMSL</td>
                    <td><?php echo $rows['DBMSLAB_IA1']; ?></td>
                    <td><?php echo $rows['DBMSLAB_IA2']; ?></td>
                    <td><?php echo $rows['DBMSLAB_IA3']; ?></td>
                    <td><?php echo $rows['DBMSLAB_ASS']; ?></td>
                    <td><?php echo $rows['DBMSLAB_CIE']; ?></td>
                    <td><?php echo $rows['DBMSLAB_SEE']; ?></td>
                    <td><?php echo $rows['DBMSLAB_TOTAL']; ?></td>
                </tr>
                <tr>
                    <th scope="row">21RMI56</th>
                    <td>RM</td>
                    <td><?php echo $rows['RM_IA1']; ?></td>
                    <td><?php echo $rows['RM_IA2']; ?></td>
                    <td><?php echo $rows['RM_IA3']; ?></td>
                    <td><?php echo $rows['RM_ASS']; ?></td>
                    <td><?php echo $rows['RM_CIE']; ?></td>
                    <td><?php echo $rows['RM_SEE']; ?></td>
                    <td><?php echo $rows['RM_TOTAL']; ?></td>
                </tr>
                <tr>
                    <th scope="row">21CIV57</th>
                    <td>EVS</td>
                    <td><?php echo $rows['EVS_IA1']; ?></td>
                    <td><?php echo $rows['EVS_IA2']; ?></td>
                    <td><?php echo $rows['EVS_IA3']; ?></td>
                    <td><?php echo $rows['EVS_ASS']; ?></td>
                    <td><?php echo $rows['EVS_CIE']; ?></td>
                    <td><?php echo $rows['EVS_SEE']; ?></td>
                    <td><?php echo $rows['EVS_TOTAL']; ?></td>
                </tr>
                <tr>
                    <th scope="row">21CS582</th>
                    <td>C#</td>
                    <td><?php echo $rows['CSHARP_IA1']; ?></td>
                    <td><?php echo $rows['CSHARP_IA2']; ?></td>
                    <td><?php echo $rows['CSHARP_IA3']; ?></td>
                    <td><?php echo $rows['CSHARP_ASS']; ?></td>
                    <td><?php echo $rows['CSHARP_CIE']; ?></td>
                    <td><?php echo $rows['CSHARP_SEE']; ?></td>
                    <td><?php echo $rows['CSHARP_TOTAL']; ?></td>
                </tr>
                <?php } 
                ?>
            </tbody>
            </table>
</div>

