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
	@$fname =$_POST['fName'];
	@$lname =$_POST['lName'];
	@$dob=date('y-m-d',strtotime($_POST['dob']));
	@$city=$_POST['city'];
	@$location =$_POST['location'];
	@$phone=$_POST['pno'];
	@$event1=$_POST['event'];
	@$event2=$_POST['event2'];
	@$requirements=$_POST['requirements'];
	@$stmt=$conn->prepare("insert into booking(firstname,lastname,dob,city,location,phone,event,other_event,requirments)values(?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("sssssisss",$fname,$lname,$dob,$city,$location,$phone,$event1,$event2,$requirements);
	$stmt->execute(); 
	?>
	<script type="text/javascript">
		var message="Your Request for Booking an event was Received \nPlease wait for Admin to Response"
		window.location.href="usereg.html";
		alert(message);
	</script>
	<?php
	$stmt->close();
	$conn->close();

}
?>