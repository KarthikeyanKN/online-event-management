<?php

//database connection
$host='localhost:3309';
$user='root';
$pass='karthik';
$db='event';
$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn)
{
	die("Couldn't connect:".mysqli_connect_error());
}
//insert data into database
else{
	@$username =$_POST['username'];
	@$dob=date('y-m-d',strtotime($_POST['dob']));
	@$phone=$_POST['phone'];
	@$address=$_POST['address'];
	@$pin=$_POST['pincode'];
	@$email =$_POST['email'];
	@$password =$_POST['password'];
	@$stmt=mysqli_query($conn,"select * from users where name='$username'");
	@$num=mysqli_num_rows($stmt);
	if($num > 0)
	{
		?>
		<script type="text/javascript">
			var message="Sorry Username Is Already Taken!!! \nPlease Enter Different Username"
			window.location.href="signin.html";
			alert(message);
		</script>
		<?php
	}
	else{
		@$stmt=$conn->prepare("insert into users(name,dob,phone,address,pincode,email,password)values(?,?,?,?,?,?,?)"); 
		$stmt->bind_param("ssisiss",$username,$dob,$phone,$address,$pin,$email,$password);
		$stmt->execute(); 
		//header("Location: login.html");
		?>
		<script type="text/javascript">
			var message="Register Successfully...! \nFor Sign in press OK"
			window.location.href="login.html";
			alert(message);
		</script>
		
		<?php
		
		$logger=new Monolog\Logger();
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
		use PHPMailer\PHPMailer\SMTP;

		require 'phpmailer\src\Exception.php';
		require 'phpmailer\src\PHPMailer.php';
		require 'phpmailer\src\SMTP.php';
		require 'vendor/autoload.php';


		$mail = new PHPMailer(true);

		try {
			
			$mail->SMTPDebug = 2;									
			$mail->isSMTP();										
			$mail->Host	 = 'smtp.gmail.com;';				
			$mail->SMTPAuth = true;							
			$mail->Username = 'karthikeyan08082003@gmail.com';				
			$mail->Password = 'dnztymsvlxrvtffh';					
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;							
			$mail->Port	 = 465;

			$mail->setFrom('karthikeyan08082003@gmail.com', 'Event Management');		
			//$mail->addAddress('receiver1@gfg.com');
			$mail->addAddress($email, $username);
			
			$mail->isHTML(true);								
			$mail->Subject = 'Register successfull';
			$mail->Body = '<p>Hello  Thank you for Register with our Webpage.<br> Now you can Access our services</p>';
			//$mail->AltBody = 'Body in plain text for non-HTML mail clients';
			$mail->send();
			echo "Mail has been sent successfully!";
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

	}
		
	$stmt->close();
	$conn->close();

}
?>