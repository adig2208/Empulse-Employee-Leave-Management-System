<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	mysqli_query($con,"delete from `leave` where id='$id'");

}

if(isset($_GET['type']) && $_GET['type']=='update' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$status=mysqli_real_escape_string($con,$_GET['status']);
	mysqli_query($con,"update `leave` set leave_status='$status' where id='$id'");
	//$sanpada=mysqli_query($con,"select DATEDIFF(leave_to,leave_from) from `leave` where id='$id'");
	// mysqli_query($con,"insert into `leave`(days) values ('$sanpada') where id='$id'");
	mysqli_query($con,"update `leave` set days = (select DATEDIFF(leave_to,leave_from) from `leave` where id='$id') where id='$id'");
	mysqli_query($con,"update `leave` set leaves_left =leaves_left - (select DATEDIFF(leave_to,leave_from) from `leave` where id='$id') where id='$id' and leave_status=2");
}
if($_SESSION['ROLE']==1){ 
	$sql="select `leave`.*, employee.email,employee.name,employee.id as eid,leave_type from `leave`,employee,leave_type where `leave`.employee_id=employee.id and leave_type.id = leave.leave_id order by `leave`.id desc";
}else{
	$eid=$_SESSION['USER_ID'];
	$sql="select `leave`.*, employee.email,employee.name,employee.id as eid,leave_type from `leave`,employee,leave_type where `leave`.employee_id='$eid' and `leave`.employee_id=employee.id and leave_type.id = leave.leave_id order by `leave`.id desc";
}
$res=mysqli_query($con,$sql);

?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Leave </h4>
						    <?php if($_SESSION['ROLE']==2){ ?>
						   <h4 class="box_title_link"><a href="add_leave.php">Add Leave</a> </h4>
						   <?php } ?>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr style="background-color:#23242D;">
                                       <th width="5%">S.No</th>
                                       <th width="5%">ID</th>
									   <th width="12%">Employee Name</th>
                                       <th width="12%">From</th>
									   <th width="12%">To</th>
									   <th width="12%">Description</th>
									   <th width="12%">Leave Type</th>
									   <th width="12%">Leave Status</th>
									   <th width="9%">Leaves Left</th>
									   <th width="10%"></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
									$i=1;
									while($row=mysqli_fetch_assoc($res)){?>
									<tr>
                                       <td><?php echo $i?></td>
									   <td><?php echo $row['id']?></td>
									   <td><?php echo $row['name'].' ('.$row['eid'].')'?></td>
                                       <td><?php echo $row['leave_from']?></td>
									   <td><?php echo $row['leave_to']?></td>
									   <td><?php echo $row['leave_reason']?></td>
									   <td><?php echo $row['leave_type']?></td>
									   <td>
										   <?php
											if($row['leave_status']==1){
												echo "Applied";
											}if($row['leave_status']==2){
												echo "Approved";
											}if($row['leave_status']==3){
												echo "Rejected";
											}
										   ?>
										   <?php if($_SESSION['ROLE']==1 && $row['leave_status']==1 ){ ?>
										   <select class="form-control" onchange="update_leave_status('<?php echo $row['id']?>',this.options[this.selectedIndex].value)">
											<option value="">Update Status</option>
											<option value="2">Approved</option>
											<option value="3">Rejected</option>
										   </select>
										   <?php } ?>
									   </td>
									   <td><?php echo $row['leaves_left']?></td>
									   <td>
									   
									   <?php
									   if($_SESSION['ROLE']==2 && $row['leave_status']==1 ){ ?>
									   <a href="leave.php?id=<?php echo $row['id']?>&type=delete" >Delete</a>
									   <?php } ?>
									   <?php
									   if($_SESSION['ROLE']==2 && $row['leave_status']==2 ){ ?>
									   <a href="cancel.php?id=<?php echo $row['id']?>&type=cancel" >Cancel</a>
									   <?php } ?>
									   <?php
									   if($_SESSION['ROLE']==1 && $row['leave_status']==2){ ?>
									   <a href="approve.php?id=<?php echo $row['id']?>&type=approve" id="element" >Approved</a>
									   <?php } ?>
									   <?php
									   if($_SESSION['ROLE']==1 && $row['leave_status']==3){ ?>
									   <a href="reject.php?id=<?php echo $row['id']?>&type=reject" id="element" >Rejected</a>
									   <?php } ?>
									   
									   
									   </td>
									   
                                    </tr>
									<?php 
									$i++;
									} ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         <script>
		 function update_leave_status(id,select_value){
			window.location.href='leave.php?id='+id+'&type=update&status='+select_value;
		 }
		 function HideMe(){
			 var x= document.getElementById("element");
			x.style.display='none';
		}
		
		 </script>
		
<?php
require('footer.inc.php');
?>