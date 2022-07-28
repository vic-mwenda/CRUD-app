<?php
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>
<body>

<?php
if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($username==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
		exit;
	}elseif($useremail==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue');
		exit;
	}elseif($userphone==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
		exit;
	}else{
		$data   =   array(
			'username'=>$username,
			'useremail'=>$useremail,
			'userphone'=>$userphone,
		);
		$insert =   $db->insert('users',$data);
		if($insert){
			header('location:'.$_SERVER['PHP_SELF'].'?msg=ras');
			exit;
		}else{
			header('location:'.$_SERVER['PHP_SELF'].'?msg=rna');
			exit;
		}
	}
}
?>

<div class="container">

<form method="post">
	<div class="form-group">
		<label>User Name <span class="text-danger">*</span></label>
		<input type="text" name="username" id="username" class="form-control" placeholder="Enter user name" required>
	</div>
	<div class="form-group">
		<label>User Email <span class="text-danger">*</span></label>
		<input type="email" name="useremail" id="useremail" class="form-control" placeholder="Enter user email" required>
	</div>
	<div class="form-group">
		<label>User Phone <span class="text-danger">*</span></label>
		<input type="tel" name="userphone" id="userphone" class="form-control" placeholder="Enter user phone" required>
	</div>
	<div class="form-group">
		<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add User</button>
	</div>
</form>

</div>


</body>
</html>
