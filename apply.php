<?php
require('db.inc.php');
$eid=$_SESSION['USER_ID'];;
$sql="select email , password from employee join `leave` on employee.id = `leave`.employee_id where employee.id='$eid' ";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);

require_once 'C:\xampp\htdocs\Employee\mailer\mailer\class.phpmailer.php'; 
// creates object
$mail = new PHPMailer(true); 
try
 {
  $mail->IsSMTP(); 
  $mail->isHTML(true);
  $mail->SMTPDebug  = 2;                     
  $mail->SMTPAuth   = true;                  
  $mail->SMTPSecure = "tls";                 
  $mail->Host       = "smtp.gmail.com";      
  $mail->Port        = '587';             
  $mail->AddAddress("receiver's email address");
  $mail->Username   =$row['email'];  
  $mail->Password   =$row['password'];            
  $mail->SetFrom($row['email'],$_SESSION['USER_NAME']);
  $mail->AddReplyTo($row['email'],$_SESSION['USER_NAME']);
  $mail->Subject    = "Leave Request";
  $mail->Body    = "Hey, <br>This is to inform you that I have applied for a leave.<br>Please do check and update the leave status.<br>Thanks for considering my request.<br><br>Regards,<br> ".$_SESSION['USER_NAME'];
  $mail->AltBody    = "Hey, <br>This is to inform you that I have applied for a leave.<br>Please do do check and update the leave status.<br>Thanks for considering my request.<br><br>Regards,<br> ".$_SESSION['USER_NAME'];
  if($mail->Send())
  {
   
   $msg = "Hi, Your mail successfully sent to ";
   
  }
 }
 catch(phpmailerException $ex)
 {
  $msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
 }
 
 header('location:leave.php');
	die();

?>
