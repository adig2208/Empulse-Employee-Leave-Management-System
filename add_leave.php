<?php
require('top.inc.php');

if(isset($_POST['submit'])){
	$leave_id=mysqli_real_escape_string($con,$_POST['leave_id']);
	$leave_from=mysqli_real_escape_string($con,$_POST['leave_from']);
	$leave_to=mysqli_real_escape_string($con,$_POST['leave_to']);
	$employee_id=$_SESSION['USER_ID'];
	$kr = mysqli_query($con,"select leaves_left from `leave` where employee_id = '$employee_id' and leave_id='$leave_id' order by id desc");
	$l = mysqli_fetch_assoc($kr);
	$leaves_left=$l['leaves_left'];
	$leave_description=mysqli_real_escape_string($con,$_POST['leave_reason']);
	$q = mysqli_query($con,"select * from `leave` where leave_id = '$leave_id' and employee_id='$employee_id'"); 
	// $r = mysqli_fetch_assoc($q);
	if(mysqli_num_rows ( $q )){
	$sql="insert into `leave`(leave_id,leave_from,leave_to,leaves_left,employee_id,leave_reason,leave_status) values('$leave_id','$leave_from','$leave_to','$leaves_left','$employee_id','$leave_description',1)";
	mysqli_query($con,$sql);
	header('location:leave.php');
	die();}
	else{
	$z=mysqli_query($con,"select Total_leaves from leave_type where id='$leave_id'");
	$tl=mysqli_fetch_assoc($z);
	$total_left=$tl['Total_leaves'];
	$sql="insert into `leave`(leave_id,leave_from,leave_to,leaves_left,employee_id,leave_reason,leave_status) values('$leave_id','$leave_from','$leave_to','$total_left','$employee_id','$leave_description',1)";
	mysqli_query($con,$sql);
	header('location:leave.php');
	die();
	}
}
$g = mysqli_query($con,"SELECT gender from employee where id =".$_SESSION['USER_ID']);
$ge= mysqli_fetch_assoc($g);
$gender=$ge['gender'];
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Leave Type</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <form method="post">
						   
								<div class="form-group">
									<label class=" form-control-label">Leave Type</label>
									<select name="leave_id" required class="form-control">
										<option value="">Select Leave</option>
										<?php
										if($gender=='male'){
										$res=mysqli_query($con,"select * from leave_type where leave_type not in ('Maternity Leave')");
										while($row=mysqli_fetch_assoc($res)){
											echo "<option value=".$row['id'].">".$row['leave_type']."</option>";
										}
									}
										else{
											$res=mysqli_query($con,"select * from leave_type where leave_type not in ('Paternity Leave')");
											while($row=mysqli_fetch_assoc($res)){
											echo "<option value=".$row['id'].">".$row['leave_type']."</option>";
										}
										}
									
										?>
									</select>
								</div>
							   <div class="form-group">
									<label class=" form-control-label">From Date</label>
									<input type="date" name="leave_from"  class="form-control" required>
								</div>
								<div class="form-group">
									<label class=" form-control-label">To Date</label>
									<input type="date" name="leave_to" class="form-control" required>
								</div>
								<div class="form-group">
									<label class=" form-control-label">Leave Description</label>
									<input type="text" name="leave_reason" class="form-control" >
								</div>
								
								<button  type="submit" name="submit" class="btn btn-lg btn-info btn-block" >
							   <span id="payment-button-amount">Submit</span>
							   </button>
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