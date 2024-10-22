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
@$username =$_POST['uname'];
@$password =$_POST['password'];
if($username=="karthik" && $password=="ka882003")
{
    header("Location: admin.php");
}
else
{
  @$stmt=mysqli_query($conn,"select * from valunteer where name='$username' and password='$password'");
	@$num=mysqli_num_rows($stmt);
	if($num > 0)
	{
		$row=mysqli_fetch_array($stmt);
	  //header("Location:valunteer2.html");
	  $query="select city from booking";
	  $result=mysqli_query($conn,$query);
	 

	  $query1="select city from valunteer where name='$username' and password='$password'";
	  $result1=mysqli_query($conn,$query1);
	  $value=mysqli_fetch_assoc($result1);


	  

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
				<a href="valunteer.html"><i class="fa fa-users"></i> Volunteer</a>
				
				<a href="contact.html"><i class="fa fa-address-book"></i> Contact Us</a>
				<a href="login.html"><i class="fa fa-user-circle"></i></a>
			</ul>
	</nav>
	
	<marquee>Hello Everyone. Welcome to Event Management. Here we will organize your Event for you as your Requirments !!!</marquee>

	<?php
	while($row1=mysqli_fetch_assoc($result))
	  {
	  	if($value==$row1)
	  	{
	  		//users table
		$query2="select * from booking where city='$value'";
		$result2=mysqli_query($conn,$query2);

	?>
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
									
									
								</tr>
								<tr>
									<?php
									while($row=mysqli_fetch_assoc($result2))
									{
										?>
										<td><?php echo $result2['firstname']?></td>
										<td><?php echo $result2['lastname']?></td>
										<td><?php echo $result2['dob']?></td>
										<td><?php echo $result2['city']?></td>
										<td><?php echo $result2['location']?></td>
										<td><?php echo $result2['phone']?></td>
										<td><?php echo $result2['event']?></td>
										<td><?php echo $result2['other_event']?></td>
										<td><?php echo $result2['requirments']?></td>
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
		<?php
		exit();
	}
	else{
		?>
		<div align="center" class="norecord">
			<h2>Welcome <?php echo "$username"; ?></h2>
		<h3>Sorry you Don't have Any Events Now. Wait for New Events or Contact Admin</h3>
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
		<?php
		exit();
	}
}
		?>
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
<?php
	  exit();
  }
  else
  {
  	?>
  	<script type="text/javascript">
  		var message="Invalid Username and Password!!! \nPlease Enter Correct Values"
			window.location.href="valunteer.html";
			alert(message);
		</script>
  	<hr>
  	<font color="red"><b>
  	<h3>Sorry Invalid Username and Password<br>Please Enter Correct Values</br></h3>
  	</b>
  	</font>
  	<hr>
  	<?php

  }
}
?>
