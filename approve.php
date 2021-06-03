<?php
require('db.inc.php');
$eid=$_GET['id'];
$sql="select email from employee join `leave` on employee.id = `leave`.employee_id where `leave`.id='$eid' ";
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
  $mail->AddAddress($row['email']);
  $mail->Username   ="your email id";  
  $mail->Password   ="*********";            
  $mail->SetFrom('your email id','name');
  $mail->AddReplyTo("your email id","name");
  $mail->Subject    = "Leave Status Update";
  $mail->Body    = "The Leave you applied for has been approved.<br><br>Regards,<br> ";
  $mail->AltBody    = "The Leave you applied for has been approved.<br><br>Regards,<br> ";

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
