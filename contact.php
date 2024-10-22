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
	@$email =$_POST['email'];
	@$feedback =$_POST['feedback'];
	@$stmt=$conn->prepare("insert into feedback(name,email,feedback)values(?,?,?)"); 
	$stmt->bind_param("sss",$username,$email,$feedback);
	$stmt->execute(); 
	//header("Location: login.html");
	?>
	<script type="text/javascript">
		var message="Your Feedback will be Received !!!"
		window.location.href="contact.html";
		alert(message);
	</script>
	<?php
	$stmt->close();
	$conn->close();

}
?>