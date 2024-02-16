<?php include('header.php'); ?>
<?php include('navigation.php'); ?>
<img src="bg2.png" class="bg" alt="">

<div class="container-fluid text-center shadow-lg p-3 mb-5 rounded">
     <div class="row h-100">
        <div class="col-2 p-3">
            <button type="button" class="btn btn-dark mt-2 mb-2"  id="atc" onclick="updateRightColumn('atc')">ATC</button><br>
            <button type="button" class="btn btn-dark mt-2 mb-2"  id="cn" onclick="updateRightColumn('cn')">CN</button><br>
            <button type="button" class="btn btn-dark mt-2 mb-2"  id="dbms" onclick="updateRightColumn('dbms')">DBMS</button><br>
            <button type="button" class="btn btn-dark mt-2 mb-2"  id="aiml" onclick="updateRightColumn('aiml')">AIML</button><br>
            <button type="button" class="btn btn-dark mt-2 mb-2"  id="dbmslab" onclick="updateRightColumn('dbmslab')">DBMS Lab</button><br>
            <button type="button" class="btn btn-dark mt-2 mb-2"  id="rm" onclick="updateRightColumn('rm')">RM</button><br>
            <button type="button" class="btn btn-dark mt-2 mb-2"  id="evs" onclick="updateRightColumn('evs')">EVS</button><br>
            <button type="button" class="btn btn-dark mt-2 mb-2"  id="c#" onclick="updateRightColumn('c#')">C#</button><br>
            <button type="button" class="btn btn-dark mt-2 mb-2" id="report" onclick="updateRightColumn('report')">Report</button><br>   
        </div>
    
         <div class="col-9  shadow-lg p-3 bg-body-tertiary  rounded" id="rightColumn">

         </div>
    </div>
</div> 
<?php include('footer.php'); ?>