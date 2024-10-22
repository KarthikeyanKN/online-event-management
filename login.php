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
  @$stmt=mysqli_query($conn,"select * from users where name='$username' and password='$password'");
	@$num=mysqli_num_rows($stmt);
	if($num > 0)
	{
		$row=mysqli_fetch_array($stmt);
	  header("Location:usereg.html");
	  exit();
  }
  else
  {
  	?>
  	<script type="text/javascript">
  		var message="Invalid Username and Password!!! \nPlease Enter Correct Values"
			window.location.href="login.html";
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
