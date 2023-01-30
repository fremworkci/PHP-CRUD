<?php 
session_start();
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}
$email=$_SESSION['email'];
$con=mysqli_connect("localhost","root","","school");
$qry=mysqli_query($con,"select * from student where email='$email'");
$row=mysqli_fetch_array($qry);
extract($row);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="continer">
	<div class="col-xl-4">
		<table class="table">
			<tr>
				<td>Name : <?php echo $name; ?></td>
			</tr>
			<tr>
				<td>Email : <?php echo $email; ?></td>
			</tr>
			<tr>
				<td>Mobile : <?php echo $mobile; ?></td>
			</tr>
			<tr>
				<td>Gender : <?php echo $gender; ?></td>
			</tr>
			<tr>
				<td>Qualification : <?php echo $qualification; ?></td>
			</tr>
			<tr>
				<td><a href="edit.php?id=<?php echo $id; ?>" class="btn btn-info">Edit</a>
					<a href="logout.php" class="btn btn-info">Logout</a>
				</td>
			</tr>
		</table>
	</div>
</div>


</body>
</html>