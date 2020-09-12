<?php include_once "navbar_header.php";?>     

<style>
    .loader {
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid black;
      border-bottom: 16px solid black;
      width: 120px;
      height: 120px;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite;
    }
    
    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }
    
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    #loader{
        display: none;
    }
</style>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
     <br><br><br><br><br><br>
  </div>

  <div class="row col-sm-12">
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
      <div class="col-sm-3">
          <span>Filter by Sex</span>
          <select name="sex" class="form-control" style="border-radius:12px;" onchange="genderFilter(this.value)">
		  	<option value="null"disabled selected>Select gender</option>
			<?php 
				$sql = "SELECT * FROM `gender` WHERE 1"; // select all gender
				$result = mysqli_query($conn, $sql);
				$count = 0;
				while($gender = mysqli_fetch_assoc($result)){
				    $count++;
					echo '<option value="'.$gender['id'].'">'.$gender['gender'].'</option>';													
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
       <tbody id="table_body">
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
                 echo '<td><a href="details.php?usr_id='.$student['student_id'].'"><i class="material-icons" title="View Details">view_carousel</i></a></td>';
                 echo '</tr>';
                 $count++; 
             }
         ?>
       </tbody>
     </table>
     <center><div id="loader" class="loader"></div></center>
  </div>
</main>
<script>
    function loadDetails(val){
        var xhttpTimer = new XMLHttpRequest();
		xhttpTimer.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			    document.getElementById("loader").style.display = "none";
				document.getElementById("table_body").innerHTML = this.responseText;
			}
		};
		xhttpTimer.open("POST", "asynchronously.php", true);
		xhttpTimer.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttpTimer.send("course_id="+val);
    }
    
    function genderDetails(val){
        var xhttpTimer = new XMLHttpRequest();
		xhttpTimer.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			    document.getElementById("loader").style.display = "none";
				document.getElementById("table_body").innerHTML = this.responseText;
			}
		};
		xhttpTimer.open("POST", "asynchronously.php", true);
		xhttpTimer.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttpTimer.send("gender_id="+val);
    }

    function filter(val){
        document.getElementById("table_body").innerHTML = "";
        document.getElementById("loader").style.display = "block";
        if (val == 'null'){
            
        }else if(val == '1'){
            loadDetails(val);
        }else if(val == '2'){
            loadDetails(val);
        }else if(val == '3'){
            loadDetails(val);
        }else if(val == '4'){
            loadDetails(val);
        }else if(val == '5'){
            loadDetails(val);
        }else if(val == '6'){
            loadDetails(val);
        }else if(val == '7'){
            loadDetails(val);
        }else if(val == '8'){
            loadDetails(val);
        }else if(val == '9'){
            loadDetails(val);
        }else if(val == '10'){
            loadDetails(val);
        }else if(val == '11'){
            loadDetails(val);
        }else if(val == '12'){
            loadDetails(val);
        }else if(val == '13'){
            loadDetails(val);
        }else if(val == '14'){
            loadDetails(val);
        }else if(val == '15'){
            loadDetails(val);
        }else if(val == '16'){
            loadDetails(val);
        }else if(val == '17'){
            loadDetails(val);
        }else if(val == '18'){
            loadDetails(val);
        }else if(val == '19'){
            loadDetails(val);
        }else if(val == '20'){
            loadDetails(val);
        }else if(val == '21'){
            loadDetails(val);
        }else if(val == '22'){
            loadDetails(val);
        }else if(val == '23'){
            loadDetails(val);
        }else if(val == '24'){
            loadDetails(val);
        }else if(val == '25'){
            loadDetails(val);
        }
    }
    
    function genderFilter(val){
        document.getElementById("table_body").innerHTML = "";
        document.getElementById("loader").style.display = "block";
        if (val == 'null'){
            
        }else if(val == '0'){
            genderDetails(val);
        }else if(val == '1'){
            genderDetails(val);
        }else if(val == '2'){
            genderDetails(val);
        }
    }
    
</script>
<?php include_once "navbar_footer.php";?>     