<?php 
if(isset($_REQUEST['save']))
{
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
	$mobile=$_REQUEST['mobile'];
	$gender=$_REQUEST['gender'];
	$qualification=implode(",", $_REQUEST['qualification']);
	$date=date("Y-m-d");

	$con=mysqli_connect("localhost","root","","school");
	$qry=mysqli_query($con,"insert into student (name,email,password,mobile,gender,qualification,created_at) values('$name','$email','$password','$mobile','$gender','$qualification','$date')");
}

?>