<?php 
    session_start();
    include_once '../classes/dbconn.class.php';
    include_once '../classes/model.class.php';
    include_once '../classes/view.class.php';
    include_once '../classes/controller.class.php';
?>

<!Doctype html>
<html>
    <head>
        <title>TMS | </title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        
        
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
        <link href="../assets/css/dashboard.css" rel="stylesheet">
        <script>
            $(document).ready(function(){
               $('[data-toggle="offcanvas"]').click(function(){
                   $("#navigation").toggleClass("hidden-xs");
               });
            });
        </script>
    </head>
    <body class="home">
        <div class="container-fluid display-table">
            <div class="row display-table-row">
                <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                    <div class="logo">
                        <a hef="home.html"><img src="https://via.placeholder.com/80x40.png?text=logo" alt="logo" class="hidden-xs hidden-sm">
                            <img src="https://via.placeholder.com/80x40.png?text=logo" alt="logo" class="visible-xs visible-sm circle-logo">
                        </a>
                    </div>
                    <div class="navi">
                        <ul>
                            <li id="index_nav"><a href="index.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Candidates</span></a></li>
                            <li id="addcandidate_nav"><a href="addcandidate.php"><i class="fa fa-user-plus" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Add Candidate</span></a></li>
                            <li id="courses_nav"><a href="courses.php"><i class="fa fa-certificate" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Courses</span></a></li>
                            <li><a href="#"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Training</span></a></li>
                            <li id="create_nav"><a href="create.php"><i class="fa fa-user-plus" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Create Admin</span></a></li>
                            <!--<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Calender</span></a></li>-->
                            <!--<li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>-->
                            <!--<li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Setting</span></a></li>-->
                        </ul>
                    </div>
                </div>
                <div class="col-md-10 col-sm-11 display-table-cell v-align">
                    <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                    <div class="row">
                        <header>
                            <div class="col-md-7">
                                <nav class="navbar-default pull-left">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                </nav>
                            </div>
                            <div class="col-md-5">
                                <div class="header-rightside">
                                    <ul class="list-inline header-top pull-right">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="https://via.placeholder.com/40x40.png?text=avatar" alt="user">
                                                <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <div class="navbar-content">
                                                        <span><?php echo $_SESSION["s_firstname"].' '. $_SESSION["s_lastname"];?></span>
                                                        <p class="text-muted small">
                                                            <?php echo $_SESSION["s_email"];?>
                                                        </p>
                                                        <div class="divider">
                                                        </div>
                                                        <a href="#" class="view btn-sm active">View Profile</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </header>
                    </div>