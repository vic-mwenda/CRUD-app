<?php
require_once "config.php";
require_once  "assets/header.php"
?>


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
if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){
	echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';
}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){
	echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';
}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){
	echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';
}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
	echo    '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
	echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
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



