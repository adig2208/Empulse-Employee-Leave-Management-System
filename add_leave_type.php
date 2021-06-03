<?php
require('top.inc.php');
if($_SESSION['ROLE']!=1){
	header('location:add_employee.php?id='.$_SESSION['USER_ID']);
	die();
}
$Total_leaves='';
$leave_type='';
$id='';
if(isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$res=mysqli_query($con,"select * from leave_type where id='$id'");
	$row=mysqli_fetch_assoc($res);
	$leave_type=$row['leave_type'];
	$Total_leaves=$row['Total_leaves'];
}
if(isset($_POST['leave_type'])){
	$leave_type=mysqli_real_escape_string($con,$_POST['leave_type']);
	$Total_leaves=mysqli_real_escape_string($con,$_POST['Total_leaves']);
	if($id>0){
		$sql="update leave_type set leave_type='$leave_type' where id='$id'";
	}else{
		$sql="insert into leave_type(leave_type,Total_leaves) values('$leave_type','$Total_leaves')";
		
	}
	mysqli_query($con,$sql);
	header('location:leave_type.php');
	die();
}
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
								<label for="leave_type" class=" form-control-label">Leave Type</label>
								<input type="text" value="<?php echo $leave_type?>" name="leave_type" placeholder="Enter your leave type" class="form-control" required></div>

								<label for="Total_leaves" class=" form-control-label">Total Leaves</label>
								<input type="text" value="<?php echo $Total_leaves?>" name="Total_leaves" placeholder="Enter Number of Leaves" class="form-control" required></div>
							   
							   <button  type="submit" class="btn btn-lg btn-info btn-block">
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