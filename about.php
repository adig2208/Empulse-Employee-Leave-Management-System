<?php
require('db.inc.php');
if(!isset($_SESSION['ROLE'])){
	header('location:login.php');
	die();
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/db1fae73c4.js" crossorigin="anonymous"></script>
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Graduate" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family:graduate;
  
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: border-box;
}

.column {
  float: left;
  width:50%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #194DAC;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: black;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}
#features{
  position: relative;
  background-color: #fff;
  text-align: center;
  padding: 7% 15%;
  padding-bottom: 7%;
  
}
.feature{
  padding:5%;
}
.coll{
  color: #194DAC;
  padding-bottom: 20px;
}
.coll:hover{
  color: #4E87EF;
}
#testimonials{
  text-align: center;
  background-color:#194DAC;
  color: #fff;
  background:cover;

}
.carousel-item{
  padding: 7% 15%;
}
.foot-icon{
  margin: 0 0.55% 0.75%;
}
.test-img{
border-radius: 50%;
width: 25%;
margin: 20px;
}
.about{
  margin-top: 3%;
}
#footer{
  text-align: center;
  margin-top: 6%;
}
p{
  color:white;
  margin:auto;
  
}
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
  padding-left:35px;
  padding-right:35px;
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
.feet{
  position: relative;
  background-color: #fff;
  text-align: center;
  padding: 1% 15%;
 
}
.foot-text{
  background-color:white;
  color:black;

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
.tp{
  color:black;
  font-family:graduate!important;
  padding-top:10px;
}
@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
 } 

</style>
</head>
<body>
  <section class="topper">
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

  <li><a href="home.php">Home</a></li>
  <?php if($_SESSION['ROLE']==1){ ?>
  <li><a href="index.php">Department Management</a></li>
  <li><a href="employee.php">Employee Management</a></li>
  <li><a href="leave_type.php">Leave Management</a></li>
  
  <?php } else { ?>
				  <li>
                     <a href="add_employee.php?id=<?php echo $_SESSION['USER_ID']?>" > Profile</a>
                  </li>
				  <?php } ?>
				   <li >
                     <a href="leave.php" > Leave</a>
                     <li><a href="about.php">About The Company</a></li>
                     
  
</ul>

</section>
  <section class=" about-section">
    <div class="row">
<div class="col-lg-6 about">
  <h1>ABOUT EMPULSE</h1>
   <p>EMPULSE is a professional software, website development company based in India that endeavor on highly proficient, timely delivered and cost effective software, website development services. We are highly experienced in offering offshore software development and project management. Some of our services include Strategic Technology Consulting, System Integration & Software Development, Enterprise Resource Planning (ERP).</p>
  
</div>
<div class="col-lg-6 " >
  <img src="bu.jpg">
</div>
</div>
</section>

<section id="features">
<div class="row">
  <div class="col-lg-4 col-md-6 feature">
    <i class="fas fa-check-circle fa-4x coll"></i>
    <h3>Job Done</h3>
    <p class="tp">The Most Effective Way To Do Is To Do It!</p>
  </div>
    <div class="col-lg-4 col-md-6 feature">
    <i class="fas fa-bullseye fa-4x coll"></i>
    <h3>Elite Clientele</h3>
    <p class="tp">Always have an attitude of gratitude.</p>
  </div>
    <div class="col-lg-4 col-md-12 feature">
    <i class="fas fa-wrench fa-4x coll"></i>
    <h3>Hard work</h3>
    <p class="tp">Work hard, have fun, make history.</p>
  </div>
</div>
  </section>
<section id="testimonials">
    <div id="carouselExampleControls" class="carousel slide" data-ride="false">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="myphoto.jpg" class="test-img" alt="Krish" >
                <div class="container">
                <h2>Krish Amesur</h2>
                <p class="title">Founder</p>
                <p>The best way to predict the future is to create it.</p>
                <p>krish@gmail.com</p>
                <i class="fab fa-twitter foot-icon"></i>
          <i class="fab fa-facebook foot-icon"></i>
          <i class="fab fa-instagram foot-icon"></i>
          <i class="fas fa-envelope foot-icon"></i>
          </div>
        </div>
        <div class="carousel-item">
          <img src="aditya.png" class="test-img"alt="Aditya" >
            <div class="container">
                <h2>Aditya Gurnani</h2>
                    <p class="title">CEO </p>
                    <p>Dreams are extremely important. You can't do it unless you imagine it.</p>
                    <p>aditya@gmail.com</p>
                    <i class="fab fa-twitter foot-icon"></i>
          <i class="fab fa-facebook foot-icon"></i>
          <i class="fab fa-instagram foot-icon"></i>
          <i class="fas fa-envelope foot-icon"></i>
                </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

  </section>
 <section class = "feet">
  <footer id="footer">
    <div class="foot">
          <p class = "foot-text"><strong>© Copyright 2020 EMPULSE</strong></p>
          <p class = "foot-text"><strong>Designed by Aditya Gurnani & Krish Amesur</strong></p>
    </div>

  </footer>
  <section>
  
</body>

</html>





