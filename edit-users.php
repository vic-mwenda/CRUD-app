<?php
require_once "config.php";
require_once "assets/header.php";
if (isset($_REQUEST['editId']) and $_REQUEST['editId'] != "") {
	$row = $db->getAllRecords('users', '*', ' AND id="' . $_REQUEST['editId'] . '"');
}

if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
	extract($_REQUEST);
	if ($username == "") {
		header('location:' . $_SERVER['PHP_SELF'] . '?msg=un&editId=' . $_REQUEST['editId']);
		exit;
	} elseif ($useremail == "") {
		header('location:' . $_SERVER['PHP_SELF'] . '?msg=ue&editId=' . $_REQUEST['editId']);
		exit;
	} elseif ($userphone == "") {
		header('location:' . $_SERVER['PHP_SELF'] . '?msg=up&editId=' . $_REQUEST['editId']);
		exit;
	}
	$data = array(
		'username' => $username,
		'useremail' => $useremail,
		'userphone' => $userphone,
	);
	$update = $db->update('users', $data, array('id' => $editId));
	if ($update) {
		header('location: browse-users.php?msg=rus');
		exit;
	} else {
		header('location: browse-users.php?msg=rnu');
		exit;
	}
}
?>

<div class="col-sm-6">
    <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
    <form method="post">
        <div class="form-group">
            <label>User Name <span class="text-danger">*</span></label>
            <input type="text" name="username" id="username" class="form-control" value="<?php echo $row[0]['username']; ?>" placeholder="Enter user name" required>
        </div>
        <div class="form-group">
            <label>User Email <span class="text-danger">*</span></label>
            <input type="email" name="useremail" id="useremail" class="form-control" value="<?php echo $row[0]['useremail']; ?>" placeholder="Enter user email" required>
        </div>
        <div class="form-group">
            <label>User Phone <span class="text-danger">*</span></label>
            <input type="tel" name="userphone" id="userphone" maxlength="12" class="form-control" value="<?php echo $row[0]['userphone']; ?>" placeholder="Enter user phone" required>
        </div>
        <div class="form-group">
            <input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
            <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update User</button>
        </div>
    </form>
</div>
