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
	@$uname =$_POST['uname'];
	@$name =$_POST['name'];
	@$cardno =$_POST['card'];
	@$expiry=$_POST['expiry'];
	@$cvv =$_POST['cvv'];
	date_default_timezone_set('Asia/Kolkata');
	@$date =date('d-m-y h:i:s');
	@$stmt=$conn->prepare("insert into payment(username,name,cardno,expiry_date,cvv,Time)values(?,?,?,?,?,?)");
	$stmt->bind_param("ssisis",$uname,$name,$cardno,$expiry,$cvv,$date);
	$stmt->execute();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Event Management System</title>
	<link rel="stylesheet" type="text/css" href="event.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css



">
</head>
<body>
	<nav>
		<label>Event Management System</label>
			<ul>
				
				<a href="event.html"><i class="fa fa-home"></i> Home</a>
				<a href="book.html"><i class="fa fa-book"></i> Book An Event</a>
				<a href="status.html"><i class="fa fa-check-circle"></i> Booking Status</a>
				
				<a href="contact.html"><i class="fa fa-address-book"></i> Contact Us</a>
				<a href="login.html"><i class="fa fa-user-circle"></i></a>
			</ul>
	</nav>
	
	<marquee>Hello Everyone. Welcome to Event Management. Here we will organize your Event for you as your Requirments !!!</marquee>
	<br>
	<br>
	<h2 align="center">Payment Processed Successfully</h2>

	<div align="center" class="pay">
		<h2>Account Details</h2>
		<h4>Name:<?php echo "$name" ?></h4>
		<h4>Card Number:<?php echo "$cardno" ?></h4>
		<h4>Expiry Date:<?php echo "$expiry" ?></h4>
		<h4>CVV:<?php echo "$cvv" ?></h4><br>
	</div>
	<footer align="center">
    	&copy 2023.All Rights Reserved.
    	<hr>
    	
    	while using this site,you agree to have read and accepted our<br> <u>terms of use,cookie and privacy policy</u>. 
    	<br>
    	<br>

    	<a href="https://instagram.com/karthikeyan_tp?igshid=YmMyMTA2M2Y="><i class="fa-brands fa-instagram"></i> Karthikeyan_tp</a>
    	<a href="https://github.com/Karthik50344/Karthik50344.git"><i class="fa-brands fa-github"></i> Karthikeyan</a>
    </footer>

</body>
</html>