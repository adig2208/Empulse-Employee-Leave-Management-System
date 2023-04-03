<?php
require('db.inc.php');

$e = mysqli_query($con,"SELECT count(*) as count from employee");
$a = mysqli_fetch_assoc($e);
$emp=$a['count'];
$d =mysqli_query($con,"SELECT count(*) as `depart` from department");
$c = mysqli_fetch_assoc($d);
$depart=$c['depart'];
$w =mysqli_query($con,"SELECT count(*) as `web` from employee where department_id = 1");
$we = mysqli_fetch_assoc($w);
$web=$we['web'];
$ds =mysqli_query($con,"SELECT count(*) as `datas` from employee where department_id = 2");
$dsc = mysqli_fetch_assoc($ds);
$dscience=$dsc['datas'];
$b =mysqli_query($con,"SELECT count(*) as `back` from employee where department_id = 3");
$bd = mysqli_fetch_assoc($b);
$backend=$bd['back'];
$h =mysqli_query($con,"SELECT count(*) as `hr` from employee where department_id = 4");
$hrd = mysqli_fetch_assoc($h);
$hr=$hrd['hr'];
$s =mysqli_query($con,"SELECT count(*) as `smd` from employee where department_id = 7");
$sm = mysqli_fetch_assoc($s);
$smd=$sm['smd'];
$m =mysqli_query($con,"SELECT count(*) as `male` from employee where gender='male'");
$ma = mysqli_fetch_assoc($m);
$male=$ma['male'];
$f =mysqli_query($con,"SELECT count(*) as `female` from employee where gender='female'");
$fe = mysqli_fetch_assoc($f);
$female=$fe['female'];
$o =mysqli_query($con,"SELECT count(*) as `ong` from project where project_status='ongoing'");
$on = mysqli_fetch_assoc($o);
$ong=$on['ong'];
$co =mysqli_query($con,"SELECT count(*) as `comp` from project where project_status='completed'");
$com = mysqli_fetch_assoc($co);
$comp=$com['comp'];
$mo=mysqli_query($con,"SELECT monthname(project_start_date) as `mo` from project group by month(project_start_date)");
$graph=[];
$r=0;
while($mon = mysqli_fetch_assoc($mo)){
	
	array_push($graph,$mon['mo']);
	$r++;
}
$dt = mysqli_query($con,"SELECT count(*) as `dt` from project where project_status='completed' group by month(project_start_date)");
$data_comp=[];
$i=0;
while($datac = mysqli_fetch_assoc($dt)){
	
	array_push($data_comp,$datac['dt']);
	$i++;
}
$do = mysqli_query($con,"SELECT count(*) as `do` from project where project_status='ongoing' group by month(project_start_date)");
$data_ong=[];
$j=0;
while($datao = mysqli_fetch_assoc($do)){
	
	array_push($data_ong,$datao['do']);
	$j++;
}
?>
<!DOCTYPE html> 
<html>
<head>
	<title>EMPULSE</title>

	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	

	<!-- Import lib -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Graduate" rel="stylesheet">
	<!-- End import lib -->

	<link rel="stylesheet" type="text/css" href="dash.css">
<style>
/* *{
padding: 0;
margin: 0;
background: cover!important;
}*/
body{
font-family:Graduate;
font-size:0.9rem;

} 
#logo{
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%,-50%);
animation: fill 0.5s ease forwards 3.5s;
}
#logo path:nth-child(1){
stroke-dasharray: 539.76px;
stroke-dashoffset: 539.76px;
animation: line-anim 1s ease forwards;
}
#logo path:nth-child(2){
stroke-dasharray:835.34px;
stroke-dashoffset:835.34px;
animation: line-anim 1s ease forwards 0.15s;
}
#logo path:nth-child(3){
stroke-dasharray:478.73px;
stroke-dashoffset:478.73px;
animation: line-anim 1s ease forwards 0.3s;
}
#logo path:nth-child(4){
stroke-dasharray:535.80px;
stroke-dashoffset:535.80px;
animation: line-anim 1s ease forwards 0.45s;
}
#logo path:nth-child(5){
stroke-dasharray:382.72px;
stroke-dashoffset:382.72px;
animation: line-anim 1s ease forwards 0.6s;

}
#logo path:nth-child(6){
stroke-dasharray:503.02px;
stroke-dashoffset:503.02px;
animation: line-anim 1s ease forwards 0.75s;
}
#logo path:nth-child(7){
stroke-dasharray:539.74px;
stroke-dashoffset:539.74px;
animation: line-anim 1s ease forwards 0.9s;
}

@keyframes line-anim{
	to{
		stroke-dashoffset:0;
	}
}
@keyframes fill{
	0%,100%{
		color: #FFF;
		fill:transparent;
		text-shadow: 0 0 10px #00B3FF;
	}
	5%,95%{
		color: #111;
		filter: blur(0px);
		text-shadow: none;
	}
}
.loader {
    position: fixed;
    z-index: 1009;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: black!important;
    display: flex;
    justify-content: center;
    align-items: center;
}

.loader.hidden {
    animation: fadeOut 2.5s;
    animation-fill-mode: forwards;
}

@keyframes fadeOut {
    100% {
        opacity: 1;
        visibility: hidden;
    }
}

.thumb {
    height: 100px;
    border: 1px solid black;
    margin: 10px;
}
</style>
</head>
<body class="overlay-scrollbar">
	<div class="loader">
	<svg id="logo" class="glow" width="1520" height="700" viewBox="0 0 1520 700" fill="none" xmlns="http://www.w3.org/2000/svg">

	<path d="M462 301H523.88V326.48H513.48V311.4H483.06V344.55H513.48V354.95H483.06V388.1H513.48V373.02H523.88V398.5H462V388.1H471.1V311.4H462V301Z" stroke="#3B96EB" stroke-width="3"  />
	<path d="M544.646 301H571.166L595.736 373.28L620.307 301H646.826V311.4H637.727V388.1H646.826V398.5H616.666V388.1H625.766V318.29L601.456 388.1H590.016L565.706 318.29V388.1H574.806V398.5H544.646V388.1H553.746V311.4H544.646V301Z" stroke="#3B96EB"
	stroke-width="3" />
	<path d="M667.664 301H719.664L733.184 315.3V345.2L719.664 359.5H688.724V388.1H699.124V398.5H667.664V388.1H676.764V311.4H667.664V301ZM688.724 312.18V348.32H714.464L722.004 340.65V319.85L714.594 312.18H688.724Z" stroke="#3B96EB" stroke-width="3"/>
	<path d="M796.627 301H825.487V311.4H817.687V384.2L804.167 398.5H768.807L755.287 384.2V311.4H747.487V301H776.347V311.4H767.247V380.43L773.877 387.32H798.967L805.727 380.43V311.4H796.627V301Z" stroke="#3B96EB" stroke-width="3"/>
	<path d="M845.018 301H876.478V311.4H866.078V388.1H894.418V373.02H904.298V398.5H845.018V388.1H854.118V311.4H845.018V301Z" stroke="#3B96EB" stroke-width="3" />
	<path
	d="M974.454 331.68H963.664V320.24L955.864 312.18H935.974L929.214 319.07V337.01L935.584 343.51H962.624L975.754 357.29V384.2L962.234 398.5H929.474L915.954 384.2V367.82H926.744V379.26L934.674 387.32H957.164L963.794 380.43V361.06L957.554 354.69H930.514L917.254 340.78V315.3L930.774 301H960.934L974.454 315.3V331.68Z"
	stroke="#3B96EB" stroke-width="3"/>
	<path d="M995.203 301H1057.08V326.48H1046.68V311.4H1016.26V344.55H1046.68V354.95H1016.26V388.1H1046.68V373.02H1057.08V398.5H995.203V388.1H1004.3V311.4H995.203V301Z" stroke="#3B96EB" stroke-width="3" />

</svg>

    </div>
	<!-- navbar -->
	<div class="navbar">
		<!-- nav left -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link">
					<i class="fas fa-bars" onclick="collapseSidebar()"></i>
				</a>
			</li>
			<li class="nav-item">
				
				<img src="image6.png" alt="EMPULSE logo" class="logo logo-dark">
			</li>
		</ul>
		<ul class="navbar-nav nav-right">
			<li class="nav-item avt-wrapper">
				<div class="avt dropdown">
                <p class="dropdown-toggle" data-toggle="user-menu" style="color:white;" >Welcome <?php echo $_SESSION['USER_NAME']?></p>
				
				<ul id="user-menu" class="dropdown-menu">
						<li  class="dropdown-menu-item">
							<a href="logout.php " class="dropdown-menu-link">
								<div>
									<i class="fas fa-sign-out-alt"></i>
								</div>
								<span style="color:white;" >Logout</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
		</ul>
	
	</div>
	
	<div class="sidebar">
		<ul class="sidebar-nav">
		
			<li class="sidebar-nav-item ">
				<a href="#" class="sidebar-nav-link active">
					<div>
                    <i class="fas fa-home"></i>
					</div>
					<span>
						HOME
					</span>
				</a>
				</li>
				<?php if($_SESSION['ROLE']==1){ ?>
			
			<li class="sidebar-nav-item ">
				<a href="index.php" class="sidebar-nav-link ">
					<div >
                    <i class="fas fa-sitemap"></i>
					</div>
					<span>DEPARTMENT</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="add_employee.php" class="sidebar-nav-link ">
					<div>
                    <i class="fas fa-users"></i>
					</div>
					<span>NEW EMPLOYEE</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="add_leave_type.php" class="sidebar-nav-link">
					<div>
						<i class="fas fa-plane-departure"></i>
					</div>
					<span>LEAVE MANAGEMENT</span>
				</a>
			</li>
			<li class="sidebar-nav-item ">
				<a href="add_project.php" class="sidebar-nav-link ">
					<div >
                    <i class="fas fa-laptop-code"></i>
					</div>
					<span>PROJECTS</span>
				</a>
			</li>
			<?php } else { ?>
				<li  class="sidebar-nav-item">
				<a href="add_employee.php?id=<?php echo $_SESSION['USER_ID']?>" class="sidebar-nav-link" >
					<div>
						<i class="fas fa-users"></i>
					</div>
					<span>PROFILE</span>
				</a>
			</li>
			<?php } ?>
			<li  class="sidebar-nav-item">
				<a href="leave.php" class="sidebar-nav-link">
					<div>
						<i class="fas fa-calendar-times"></i>
					</div>
					<span>LEAVE REQUESTS</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="about.php" class="sidebar-nav-link">
					<div>
                    <i class="fab fa-etsy"></i>
					</div>
					<span>ABOUT THE COMPANY</span>
				</a>
			</li>
		</ul>
    </div>
    
	<div class="wrapper">
		<div class="row">
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-primary">
					<p>
						<i class="fas fa-users fa-2x"></i>
					</p>
					<h3>TOTAL EMPLOYEES : <?php echo $emp ?></h3>
					<p>Active Employee Family</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-warning">
					<p>
					<i class="fab fa-buffer fa-2x"></i>
					</p>
					<h3>TOTAL DEPARTMENTS : <?php echo $depart ?></h3>
					<p>Efficient Working Systems</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-success">
					<p>
					<i class="fas fa-tools fa-2x"></i>
					</p>
					<h3>ONGOING PROJECTS : <?php echo $ong ?></h3>
					<p>Targets Achieved On Time</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-danger">
					<p>
					<i class="fas fa-check-square fa-2x"></i>
					</p>
					<h3>COMPLETED PROJECTS :<?php echo $comp ?></h3>
					<p>Client Satisfaction Is Our Priority</p>
				</div>
			</div>
		</div>
			<?php if($_SESSION['ROLE']==1){ ?>
			 <div class="row">
			<div class="col-6 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h3>
							EMPLOYEE TRACKER
						</h3>
						<i class="fas fa-ellipsis-h"></i>
					</div>
					<div class="card-content">
						<div class="progress-wrapper">
							<p>
								WEB DEVELOPMENT [Employees : <?php echo ($web)?>]
								<span class="float-right"><?php echo round((($web/$emp)*100))?>%</span>
							</p>
							<div class="progress">
								<div class="bg-success" style="width: <?php echo round((($web/$emp)*100))?>%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								DATA SCIENCE [Employees : <?php echo ($dscience)?>]
								<span class="float-right"><?php echo round((($dscience/$emp)*100))?>%</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:<?php echo round((($dscience/$emp)*100))?>%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								BACKEND DEVELOPMENT [Employees : <?php echo ($backend)?>]
								<span class="float-right"><?php echo round((($backend/$emp)*100))?>%</span>
							</p>
							<div class="progress">
								<div class="bg-warning" style="width:<?php echo round((($backend/$emp)*100))?>%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
								APP DEEVELOPMENT [Employees : <?php echo ($hr)?>]
								<span class="float-right"><?php echo round((($hr/$emp)*100))?>%</span>
							</p>
							<div class="progress">
								<div class="bg-danger" style="width:<?php echo round((($hr/$emp)*100))?>%"></div>
							</div>
							<div class="progress-wrapper">
							<p>
								SALES AND MARKETING [Employees : <?php echo ($smd)?>]
								<span class="float-right"><?php echo round((($smd/$emp)*100))?>%</span>
							</p>
							<div class="progress">
								<div class="bg-warning" style="width:<?php echo round((($smd/$emp)*100))?>%"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
			
		
				<div class="col-6 col-m-12 col-sm-12">
				<div class="card" >
					<div class="card-header">
						<h3>
							MALE/FEMALE EMPLOYEE RATIO
						</h3>
						<i class="fas fa-ellipsis-h"></i>
					</div>
					<div class="card-content" >
						<div class="progress-wrapper">
							<p>
							<i class="fas fa-female fa-2x"></i> FEMALE EMPLOYEES : <?php echo ($female)?>
								<span class="float-right"><?php echo round((($female/$emp)*100))?>%</span>
							</p>
							<div class="progress">
								<div class="bg-success" style="width: <?php echo round((($female/$emp)*100))?>%"></div>
							</div>
						</div>
						<div class="progress-wrapper">
							<p>
							<i class="fas fa-male fa-2x"></i> MALE EMPLOYEES : <?php echo ($male)?>
								<span class="float-right"><?php echo round((($male/$emp)*100))?>%</span>
							</p>
							<div class="progress">
								<div class="bg-primary" style="width:<?php echo round((($male/$emp)*100))?>%"></div>
							</div>
						</div>
						
			
			</div>
			</div>
			</div>
			
		
			
			<div class="col-12 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h3>
							COMPANY PROJECT CHART
						</h3>
					</div>
					<div class="card-content">
						<canvas id="myChart"></canvas>
					</div>
				</div>
			</div>
		</div>
			
	
	<?php } else { ?>
		
		<div class="row">
			<div class="col-12 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h3>
							COMPANY PROJECT CHART
						</h3>
					</div>
					<div class="card-content">
						<canvas id="myChart"></canvas>
					</div>
				</div>
			</div>
		</div>
	
	<?php } ?>
	<!-- end main content -->
	<!-- import script -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script>
	const primaryColor = '#4834d4'
	const warningColor = '#f0932b'
	const successColor = '#6ab04c'
	const dangerColor = '#eb4d4b'

	const themeCookieName = 'theme'
	const themeDark = 'dark'
	const themeLight = 'light'

	const body = document.getElementsByTagName('body')[0]

	function setCookie(cname, cvalue, exdays) {
	  var d = new Date()
	  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000))
	  var expires = "expires="+d.toUTCString()
	  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/"
	}

	function getCookie(cname) {
	  var name = cname + "="
	  var ca = document.cookie.split(';')
	  for(var i = 0; i < ca.length; i++) {
	    var c = ca[i];
	    while (c.charAt(0) == ' ') {
	      c = c.substring(1)
	    }
	    if (c.indexOf(name) == 0) {
	      return c.substring(name.length, c.length)
	    }
	  }
	  return ""
	}

	loadTheme()

	function loadTheme() {
		var theme = getCookie(themeCookieName)
		body.classList.add(theme === "" ? themeDark : theme)
	}


	function collapseSidebar() {
		body.classList.toggle('sidebar-expand')
	}

	window.onclick = function(event) {
		openCloseDropdown(event)
	}

	function closeAllDropdown() {
		var dropdowns = document.getElementsByClassName('dropdown-expand')
		for (var i = 0; i < dropdowns.length; i++) {
			dropdowns[i].classList.remove('dropdown-expand')
		}
	}

	function openCloseDropdown(event) {
		if (!event.target.matches('.dropdown-toggle')) {
			
			closeAllDropdown()
		} else {
			var toggle = event.target.dataset.toggle
			var content = document.getElementById(toggle)
			if (content.classList.contains('dropdown-expand')) {
				closeAllDropdown()
			} else {
				closeAllDropdown()
				content.classList.add('dropdown-expand')
			}
		}
	}

	var ctx = document.getElementById('myChart')
	ctx.height = 500
	ctx.width = 500
	var data = {
		labels:<?php echo json_encode($graph);?>,
		datasets: [{
			fill: false,
			label: 'Completed',
			borderColor: successColor,
			data: <?php echo json_encode($data_comp);?>,
			borderWidth: 2,
			lineTension: 0,
		}, {
			fill: false,
			label: 'Ongoing',
			borderColor: dangerColor,
			data: <?php echo json_encode($data_ong);?>,
			borderWidth: 2,
			lineTension: 0,
		}]
	}

	var lineChart = new Chart(ctx, {
		type: 'line',
		data: data,
		options: {
			maintainAspectRatio: false,
			bezierCurve: false,
		}
	})
	
	window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden"; // class "loader hidden"
});

</script>
	<!-- end import script -->
</body>
</html>