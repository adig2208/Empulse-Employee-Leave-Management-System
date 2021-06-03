<?php
require('top.inc.php');
$client_name='';
$project_name='';
$project_status='';
$project_start='';
$id='';
if(isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	if($_SESSION['ROLE']==2 && $_SESSION['USER_ID']!=$id){
		die('Access denied');
	}
	$res=mysqli_query($con,"select * from project where id='$id'");
	$row=mysqli_fetch_assoc($res);
	$client_name=$row['client_name'];
    $project_name=$row['project_name'];
    $project_status=$row['project_status'];
    $project_start=$row['project_start_date'];

}
if(isset($_POST['submit'])){
	$client_name=mysqli_real_escape_string($con,$_POST['client_name']);
	$project_name=mysqli_real_escape_string($con,$_POST['project_name']);
	$project_status=mysqli_real_escape_string($con,$_POST['project_status']);
	$project_start=mysqli_real_escape_string($con,$_POST['project_start_date']);
	

	if($id>0){
		$sql="update project set client_name='$client_name',project_name='$project_name',project_status='$project_status',project_start_date='$project_start'";
	}else{
		$sql="insert into project(client_name,project_name,project_status,project_start_date) values('$client_name','$project_name','$project_status','$project_start')";
	}
	mysqli_query($con,$sql);
	header('location:add_project.php');
	die();
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>ADD PROJECT</strong></div>
                        <div class="card-body card-block">
                           <form method="post">
							   <div class="form-group">
									<label class=" form-control-label">Client Name</label>
									<input type="text" value="<?php echo $client_name?>" name="client_name" placeholder="Enter client name" class="form-control" required>
								</div>
								
								<div class="form-group">
									<label class=" form-control-label">Project Name</label>
									<input type="text" value="<?php echo $project_name?>" name="project_name" placeholder="Enter project name" class="form-control" required>
                                </div>
                                <div class="form-group">
									<label class=" form-control-label">Project Status</label>
									<select name="project_status" required class="form-control">
										<option value="">Status</option>
										<option value="ongoing">Ongoing</option>
										<option value="completed">Completed</option>
									</select>
								</div>
								
								<div class="form-group">
									<label class=" form-control-label">Project Start Date</label>
									<input type="date"  name="project_start_date" placeholder="date" class="form-control" required>
								</div>
								
							
							   <?php if($_SESSION['ROLE']==1){?>
							   <button  type="submit" name="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <?php } ?>
							  </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                  
<?php
require('footer.inc.php');
?>