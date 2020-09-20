<?php 
    include_once 'includes/header.php';
?>

<main class="container-fluid">
    <div class="row"> 
        <div class="col-md-6">
            <h4><b>Available Courses</b></h4>
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Course Name</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        $modelObj = new Model();
                        $courses = $modelObj->getCourses();
                        
                        $sn_count = 1;
                        foreach($courses as $value){
                            $course_name = $value["course_name"];
                            echo '<tr>
                                    <td>'.$sn_count.'</td>
                                    <td>'.$course_name.'</td>
                                    <td><i class="fa fa-trash fa-2x" aria-hidden="true" style="color:#428bca" ></td>
                                    <td><i class="fa fa-edit fa-2x" aria-hidden="true" style="color:#428bca" ></td>
                                  </tr>';
                            $sn_count++;
                        }
                    ?>
                 
                </tbody>
              </table>
            </div>
        </div>
        <div class="col-md-4">
            <h4><b>Add New Course</b></h4>
            <div class="form-inline">
        		<input type="text" name="new_course" class="form-control" id="email" placeholder="Enter New Course Name" required>
    
        		<input type="submit" name="add" class="btn btn-primary btn-inline" style="border-radius:12px;" value="ADD+">
    		</div>
        </div>
    </div>
    
</main>
<script>
    document.getElementById("courses_nav").className = 'active'; // make Dashboard link inactive
</script>

<?php include_once 'includes/footer.php';?>