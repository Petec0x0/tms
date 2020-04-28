<?php
    include_once "includes/dbconnection.php";
    
    if(isset($_POST["course_id"])){ // filter by course id
        $course_id = $_POST["course_id"];
        $sql = "SELECT students.student_id, students.firstname, students.lastname, students.phone_no, students.registered_date, students.start_date, students.round_off_date, students.amount_charged, students.amount_paid, students.outstanding_dept, gender.code as code FROM `students` 
                INNER JOIN gender ON students.gender=gender.id INNER JOIN training ON students.student_id=training.student_id INNER JOIN courses ON training.course_id=courses.course_id WHERE courses.course_id = '$course_id'";
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
    }
?>