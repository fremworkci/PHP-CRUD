<?php 
if(isset($_REQUEST["login"]))
{
	$email=$_REQUEST["email"];
	$password=$_REQUEST["password"];
	$con=mysqli_connect("localhost","root","","school");
	$qry=mysqli_query($con,"select * from student where email='$email' and password='$password'");
	$row=mysqli_fetch_array($qry);
	if($row)
	{
		session_start();
		$_SESSION['email']=$email;
		header("location:profile.php");
	}
	else
	{
		session_start();
		$_SESSION['login_error']="Invalid User name and password";
		header("location:index.php");
	}
}

?>