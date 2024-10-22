<?php

//database connection
$host='localhost:3309';
$user='root';
$pass='karthik';
$db='event';
$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn)
{
	die("Couldn't connect.".mysql_connect_error());
}
//users table
$query="select * from users";
$result=mysqli_query($conn,$query);
//bookig table
$query1="select * from booking";
$result1=mysqli_query($conn,$query1);
//feedback table
$query2="select * from feedback";
$result2=mysqli_query($conn,$query2);
//payment table
$query3="select * from payment";
$result3=mysqli_query($conn,$query3);
//valunteer table
$query4="select * from valunteer";
$result4=mysqli_query($conn,$query4);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Event Management System</title>
	<link rel="stylesheet" type="text/css" href="event.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<nav>
		<label>Event Management System</label>
			<ul>
				
				<a href="event.html"><i class="fa fa-home"></i> Home</a>
				<a href="book.html"><i class="fa fa-book"></i> Book An Event</a>
				<a href="valunteer.html"><i class="fa fa-users"></i> Volunteer</a>
				
				<a href="contact.html"><i class="fa fa-address-book"></i> Contact Us</a>
				<a href="login.html"><i class="fa fa-user-circle"></i></a>
			</ul>
	</nav>
	
	<marquee>Hello Everyone. Welcome to Event Management. Here we will organize your Event for you as your Requirments !!!</marquee>
	<div class="dataretrieve">
		<h1 align="center">Welcome <b>Karthikeyan</b> Here is your customer lists.</h1>
	</div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-header">
							<h2 align="center" class="display-6 text-center">Users List From the Database</h2>
						</div>
						<div class="card-body">
							<table class="table table-bordered text-center">
								<tr class="bg-dark text-skyblue">
									<th>Username</th>
									<th>DOB</th>
									<th>Phone No</th>
									<th>Address</th>
									<th>Pincode</th>
									<th>Email</th>
									<th>Password</th>
								</tr>
								<tr>
									<?php
									while($row=mysqli_fetch_assoc($result))
									{
										?>
										<td><?php echo $row['name']?></td>
										<td><?php echo $row['dob']?></td>
										<td><?php echo $row['phone']?></td>
										<td><?php echo $row['address']?></td>
										<td><?php echo $row['pincode']?></td>
										<td><?php echo $row['email']?></td>
										<td><?php echo $row['password']?></td>

									</tr>	
										<?php
									}
									
									?>
								
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-header">
							<h2 align="center" class="display-6 text-center">Valunteers List From the Database</h2>
						</div>
						<div class="card-body">
							<table class="table table-bordered text-center">
								<tr class="bg-dark text-skyblue">
									<th>Username</th>
									<th>DOB</th>
									<th>Phone No</th>
									<th>Address</th>
									<th>City</th>
									<th>Pincode</th>
									<th>Email</th>
									<th>Password</th>
								</tr>
								<tr>
									<?php
									while($row=mysqli_fetch_assoc($result4))
									{
										?>
										<td><?php echo $row['name']?></td>
										<td><?php echo $row['dob']?></td>
										<td><?php echo $row['phone']?></td>
										<td><?php echo $row['address']?></td>
										<td><?php echo $row['city']?></td>
										<td><?php echo $row['pincode']?></td>
										<td><?php echo $row['email']?></td>
										<td><?php echo $row['password']?></td>

									</tr>	
										<?php
									}
									
									?>
								
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-header">
							<h2 align="center" class="display-6 text-center">Users Event Booking List From the Database</h2>
						</div>
						<div class="card-body">
							<table class="table table-bordered text-center">
								<tr class="bg-dark text-skyblue">
									<th>First Name</th>
									<th>Last Name</th>
									<th>DOB</th>
									<th>City</th>
									<th>Location</th>
									<th>Phone No</th>
									<th>Event</th>
									<th>Mention Event</th>
									<th>Requirements</th>
									<th>Accept / Decline</th>
									
								</tr>
								<tr>
									<?php
									while($row=mysqli_fetch_assoc($result1))
									{
										?>
										<td><?php echo $row['firstname']?></td>
										<td><?php echo $row['lastname']?></td>
										<td><?php echo $row['dob']?></td>
										<td><?php echo $row['city']?></td>
										<td><?php echo $row['location']?></td>
										<td><?php echo $row['phone']?></td>
										<td><?php echo $row['event']?></td>
										<td><?php echo $row['other_event']?></td>
										<td><?php echo $row['requirments']?></td>
										<div name="decision">
										<td align="center"><input class="button1" onclick="acceptevent()" type="submit" value="Accept"><input class="button2" bgcolor="red" onclick="declineevent()" type="submit" value="Decline"></td>
										</div>
									</tr>	
										<?php
									}
									
									?>
								
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-header">
							<h2 align="center" class="display-6 text-center">Users Feedback List From the Database</h2>
						</div>
						<div class="card-body">
							<table class="table table-bordered text-center">
								<tr class="bg-dark text-skyblue">
									<th>Name</th>
									<th>Email</th>
									<th>Feedback</th>
									
								</tr>
								<tr>
									<?php
									while($row=mysqli_fetch_assoc($result2))
									{
										?>
										<td><?php echo $row['name']?></td>
										<td><?php echo $row['email']?></td>
										<td><?php echo $row['feedback']?></td>

									</tr>	
										<?php
									}
									
									?>
								
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-header">
							<h2 align="center" class="display-6 text-center">Users Payment Details From the Database</h2>
						</div>
						<div class="card-body">
							<table class="table table-bordered text-center">
								<tr class="bg-dark text-skyblue">
									<th>User Name</th>
									<th>Name</th>
									<th>Card Number</th>
									<th>Expiry Date</th>
									<th>CVV</th>
									<th>Time</th>
									
								</tr>
								<tr>
									<?php
									while($row=mysqli_fetch_assoc($result3))
									{
										?>
										<td><?php echo $row['username']?></td>
										<td><?php echo $row['name']?></td>
										<td><?php echo $row['cardno']?></td>
										<td><?php echo $row['expiry_date']?></td>
										<td><?php echo $row['cvv']?></td>
										<td><?php echo $row['Time']?></td>

									</tr>	
										<?php
									}
									
									?>
								
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	<br>
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