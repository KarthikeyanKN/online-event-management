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
	@$city=$_POST['city'];
	@$pin=$_POST['pincode'];
	@$email =$_POST['email'];
	@$password =$_POST['password'];
	@$stmt=mysqli_query($conn,"select * from valunteer where name='$username'");
	@$num=mysqli_num_rows($stmt);
	if($num > 0)
	{
		?>
		<script type="text/javascript">
			var message="Sorry Username Is Already Taken!!! \nPlease Enter Different Username"
			window.location.href="valunteer1.html";
			alert(message);
		</script>
		<?php
	}
	else{
		@$stmt=$conn->prepare("insert into valunteer(name,dob,phone,address,city,pincode,email,password)values(?,?,?,?,?,?,?,?)"); 
		$stmt->bind_param("ssississ",$username,$dob,$phone,$address,$city,$pin,$email,$password);
		$stmt->execute(); 
		//header("Location: login.html");
		?>
		<script type="text/javascript">
			var message="Register Successfully...! \nFor Sign in press OK"
			window.location.href="valunteer.html";
			alert(message);
		</script>
		
		<?php
		

		//use PHPMailer\PHPMailer\PHPMailer;
		//use PHPMailer\PHPMailer\Exception;
		require 'C:\Users\ELCOT\Downloads\PHPMailer-master\PHPMailer-master\src\Exception.php';
		require 'C:\Users\ELCOT\Downloads\PHPMailer-master\PHPMailer-master\src\PHPMailer.php';
		require 'C:\Users\ELCOT\Downloads\PHPMailer-master\PHPMailer-master\src\SMTP.php';
		require 'vendor/autoload.php';


		$mail = new PHPMailer(true);

		try {
			
			$mail->SMTPDebug = 2;									
			$mail->isSMTP();										
			$mail->Host	 = 'smtp.gmail.com;';				
			$mail->SMTPAuth = true;							
			$mail->Username = 'karthikeyan08082003@gmail.com';				
			$mail->Password = 'ka882003';					
			$mail->SMTPSecure = 'tls';							
			$mail->Port	 = 587;

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