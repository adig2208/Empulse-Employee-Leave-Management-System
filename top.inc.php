<?php
require('db.inc.php');
if(!isset($_SESSION['ROLE'])){
	header('location:login.php');
	die();
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
   <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>EMPULSE</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      
      <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Graduate" rel="stylesheet">
<style>
ul {
  font-family: Graduate ;
  list-style-type: none;
  margin-top:40px;
  margin-bottom: 0;
  padding-top:0;
  overflow: hidden;
  background-color: #23242D;
  display:absolute;

  
}

li {
  float:left;
  padding-left:23px;
  padding-right:23px;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: blue;
  color: white;
}
.nam{
   color: white;
}

.nam:hover{
   color: blue;
}
.user-area .user-menu {
    background: #2B2B2B;
    border-radius: 10px;
    left: inherit!important;
    right: 0;
    top: 54px!important;
    margin: 0;
    max-width: 250px;
    padding: 5px 10px;
    position: absolute;
    width: 100%;
    height: 80%;
    z-index: 999;
    min-width: 250px;
    -webkit-box-shadow: 0 3px 12px rgba(0, 0, 0, 1);
    box-shadow: 0 3px 12px rgba(0, 0, 0, 1);
}
.logout-text{
   font-size:1rem!important;
   
   color:white!important;
}
.user-area:hover .user-menu:hover{
   background: black;
}
.sign{
   color:white;
   font-size:1.1rem;
   padding-right:15px;
}
</style>
</head>
<body style="background-color:black;">
<img src="image6.png" width="200" height="55" style=" margin:0; padding:0;" align="left">
   <div class="float-right">
   
   <div class="top-right">
               <div class="header-menu">
                  <div class="user-area dropdown float-right">
                     <a href="#" class="dropdown-toggle active nam" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-right:15px; color:white;">Welcome <?php echo $_SESSION['USER_NAME']?></a>
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link " href="logout.php"><i class="fas fa-sign-out-alt sign" ></i><span class="logout-text">Logout</span></a>
                        
                     </div>
                  </div>
               </div>
            </div>
</div>
<br>
  
   
   

<ul>

  <li><a class="active" href="home.php">Home</a></li>
  <?php if($_SESSION['ROLE']==1){ ?>
  <li><a href="index.php">Department Management</a></li>
  <li><a href="employee.php">Employee Management</a></li>
  <li><a href="leave_type.php">Leave Management</a></li>
  <li><a href="add_project.php">Projects</a></li>
  
  <?php } else { ?>
				  <li>
                     <a href="add_employee.php?id=<?php echo $_SESSION['USER_ID']?>" > Profile</a>
                  </li>
				  <?php } ?>
				   <li >
                     <a href="leave.php" > Leave</a>
                     <li><a href="about.php">About The Company</a></li>
                     
  
</ul>
</body>
</html>
