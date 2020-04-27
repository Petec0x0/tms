<?php include_once "navbar_header.php";?>     
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
     <br><br><br><br><br><br>
  </div>


  <h2>Candidates list</h2>
  <div class="table-responsive">
 <table class="table table-striped table-sm">
   <thead>
     <tr>
       <th>#</th>
       <th>First Name</th>
       <th>Last Name</th>
       <th>Phone</th>
       <th>Sex</th>
       <th>Registered Date</th>
       <th>Registered Course(s)</th>
       <th>Start Date</th>
       <th>End Date</th>
       <th>Amount Charged</th>
       <th>Total Paid</th>
       <th>Total Outstanding</th>
       <th>View Details</th>
     </tr>
   </thead>
   <tbody>
     <?php 
         $sql = "SELECT students.student_id, students.firstname, students.lastname, students.phone_no, students.registered_date, students.start_date, students.round_off_date, students.amount_charged, students.amount_paid, students.outstanding_dept, gender.code as code FROM `students` 
         INNER JOIN gender ON students.gender=gender.id";
         $result = mysqli_query($conn, $sql);
         $count = 1;
         while($student = mysqli_fetch_assoc($result)){
             echo '<tr>';
             echo '<td>'.$count.'</td>';
             echo '<td>'.$student['firstname'].'</td>';
             echo '<td>'.$student['lastname'].'</td>';
             echo '<td>'.$student['phone_no'].'</td>';
             echo '<td>'.$student['code'].'</td>';
             echo '<td>'.$student['registered_date'].'</td>';
             echo '<td>';
                 echo '<select name="courses" class="form-control" style="border-radius:12px;">';
                 $student_id = $student['student_id'];
                 $sql_2 = "SELECT courses.course_name as course FROM `training` INNER JOIN courses ON training.course_id=courses.course_id WHERE `student_id` = '$student_id'"; // 
    			 $result_2 = mysqli_query($conn, $sql_2);
    			 while($course = mysqli_fetch_assoc($result_2)){
    			 	echo '<option>'.$course['course'].'</option>';													
    			 }
                 echo '</select>';
             echo '</td>';
             echo '<td>'.$student['start_date'].'</td>';
             echo '<td>'.$student['round_off_date'].'</td>';
             echo '<td>'.$student['amount_charged'].'</td>';
             echo '<td>'.$student['amount_paid'].'</td>';
             echo '<td>'.$student['outstanding_dept'].'</td>';
             echo '<td><a href="#"><i class="material-icons" title="View Details">view_carousel</i></a></td>';
             echo '</tr>';
             $count++; 
         }
     ?>
   </tbody>
 </table>
  </div>
</main>
<?php include_once "navbar_footer.php";?>     