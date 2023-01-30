<?php 
session_start();
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}
$id=$_REQUEST['id'];
$con=mysqli_connect("localhost","root","","school");
$qry=mysqli_query($con,"select * from student where id='$id'");
$row=mysqli_fetch_array($qry);
extract($row);
$qualification=explode(",", $qualification);
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="container">
	<div class="row">
		<div class="col-xl-6">
			<div id="msg"></div>
			<form method="post" id="update">
				<div class="form-group">
					<label>Name : </label>
					<input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
				</div>
				<div class="form-group">
					<label>Email : </label>
					<input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
				</div>
				<div class="form-group">
					<label>Mobile : </label>
					<input type="text" name="mobile" class="form-control" value="<?php echo $mobile; ?>">
				</div>
				<div class="form-group">
					<label>Gender : </label>
					<input type="radio" name="gender" value="male" <?php echo $gender=='male' ? 'checked' : '' ?> >Male
					<input type="radio" name="gender" value="female" <?php echo $gender=='female' ? 'checked' : '' ?> >Female
				</div>
				<div class="form-group">
					<label>Qualification : </label>
					<input type="checkbox" name="qualification[]" value="mca"
					<?php  
					if(in_array("mca", $qualification))
					{
						echo "checked";
					}
					?>
					>MCA
					<input type="checkbox" name="qualification[]" value="bca"
					<?php  
					if(in_array("bca", $qualification))
					{
						echo "checked";
					}
					?>
					>BCA
					<input type="checkbox" name="qualification[]" value="b.tech"
					<?php  
					if(in_array("b.tech", $qualification))
					{
						echo "checked";
					}
					?>
					>B.Tech
				</div>
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="submit" name="update" class="btn btn-info" value="Update">
			</form>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
	$("#update").validate({
		rules:{
			name : {
				required:true,
			},
			email : {
				required:true,
			},
			mobile : {
				required:true,
			},
		},

		submitHandler:function(form)
		{
			$.ajax({
				url : 'update.php',
				type: 'POST',
				data: new FormData($('form')[0]),
				contentType:false,
				cache:false,
				processData:false,
				success:function(data)
				{
					$("#msg").html('Data update successfully');
				}
			});
		}
	});
</script>