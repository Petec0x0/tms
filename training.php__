<?php include_once "navbar_header.php";?>     
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
     <br><br><br><br><br><br>
  </div>


  <h2>Student list</h2>
  <div class="table-responsive">
 <table class="table table-striped table-sm">
   <thead>
     <tr>
       <th>#</th>
       <th>Package/Course</th>
       <th>Category</th>
       <th>Student ID</th>
       <th>Round Off Date</th>
     </tr>
   </thead>
   <tbody>
     <?php 
         $sql = "SELECT * FROM `students` WHERE 1";
         $result = mysqli_query($conn, $sql);
         $count = 1;
         while($student = mysqli_fetch_assoc($result)){
             echo '<tr>';
             echo '<td>'.$count.'</td>';
             echo '<td>'.$student['firstname'].'</td>';
             echo '<td>'.$student['lastname'].'</td>';
             echo '<td>'.$student['email'].'</td>';
             echo '<td>'.$student['phone_no'].'</td>';
             echo '<td>'.$student['registered_date'].'</td>';
             echo '<td><i class="material-icons">view_carousel</i>';
             echo '</tr>';
             $count++; 
         }
     ?>
   </tbody>
 </table>
  </div>
</main>
<?php include_once "navbar_footer.php";?>     