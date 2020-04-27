<?php include_once "navbar_header.php";?>     
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
     <br><br><br><br><br><br>
  </div>

  <div class="col-sm-12">
      <div class="col-sm-3">
          <span>Filter by Course</span>
          <select name="courses" class="form-control" style="border-radius:12px;" onchange="filter(this.value)">
		  	<option value="null"disabled selected>Select Course</option>
			<?php 
				$sql = "SELECT * FROM `courses` WHERE 1"; // select all courses
				$result = mysqli_query($conn, $sql);
				$count = 0;
				while($course = mysqli_fetch_assoc($result)){
				    $count++;
					echo '<option value="'.$course['course_id'].'">'.$course['course_name'].'</option>';													
				}
			?>
		</select>
      </div>
  </div>
  <h4></h3>
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
<script>
    function filter(val){
        if (val == 'null'){
            
        }else if(val == '1'){
            
        }else if(val == '2'){
            
        }else if(val == '3'){
            
        }else if(val == '4'){
            
        }else if(val == '5'){
            
        }else if(val == '6'){
            
        }else if(val == '7'){
            
        }else if(val == '8'){
            
        }else if(val == '9'){
            
        }else if(val == '10'){
            
        }else if(val == '11'){
            
        }else if(val == '12'){
            
        }else if(val == '13'){
            
        }else if(val == '14'){
            
        }else if(val == '15'){
            
        }else if(val == '16'){
            
        }else if(val == '17'){
            
        }else if(val == '18'){
            
        }else if(val == '19'){
            
        }else if(val == '20'){
            
        }else if(val == '21'){
            
        }else if(val == '22'){
            
        }else if(val == '23'){
            
        }else if(val == '24'){
            
        }else if(val == '25'){
            
        }
    }
    
</script>
<?php include_once "navbar_footer.php";?>     