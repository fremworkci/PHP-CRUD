<?php 
session_start();
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}

$id=$_REQUEST['id'];
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$mobile=$_REQUEST['mobile'];
$gender=$_REQUEST['gender'];
$qualification=implode(",", $_REQUEST['qualification']);
$con=mysqli_connect("localhost","root","","school");
$qry=mysqli_query($con,"update student set name='$name',email='$email',mobile='$mobile',gender='$gender',qualification='$qualification' where id='$id'");
?>