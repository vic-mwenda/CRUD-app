<?php
require_once "config.php";

$condition = '';
if (isset($_REQUEST['username']) and $_REQUEST['username'] != "") {
	$condition .= ' AND username LIKE "%' . $_REQUEST['username'] . '%" ';
}
if (isset($_REQUEST['useremail']) and $_REQUEST['useremail'] != "") {
	$condition .= ' AND useremail LIKE "%' . $_REQUEST['useremail'] . '%" ';
}
if (isset($_REQUEST['userphone']) and $_REQUEST['userphone'] != "") {
	$condition .= ' AND userphone LIKE "%' . $_REQUEST['userphone'] . '%" ';
}
if (isset($_REQUEST['df']) and $_REQUEST['df'] != "") {

	$condition .= ' AND DATE(dt)>="' . $_REQUEST['df'] . '" ';

}
if (isset($_REQUEST['dt']) and $_REQUEST['dt'] != "") {

	$condition .= ' AND DATE(dt)<="' . $_REQUEST['dt'] . '" ';

}
$userData = $db->getAllRecords('users', '*', $condition);
?>
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" type="text/css">
	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>

</head>

<div class="col-sm-12">
    <h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find User</h5>
    <form method="get">
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($_REQUEST['username'])?$_REQUEST['username']:''?>" placeholder="Enter user name">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>User Email</label>
                    <input type="email" name="useremail" id="useremail" class="form-control" value="<?php echo isset($_REQUEST['useremail'])?$_REQUEST['useremail']:''?>" placeholder="Enter user email">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>User Phone</label>
                    <input type="tel" class="tel form-control" name="userphone" id="userphone" x-autocompletetype="tel" value="<?php echo isset($_REQUEST['userphone'])?$_REQUEST['userphone']:''?>" placeholder="Enter user phone">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Date</label>
                    <div class="input-group">
                        <input type="text" class="fromDate form-control" name="df" id="df" value="<?php echo isset($_REQUEST['df'])?$_REQUEST['df']:''?>" placeholder="Enter from date">
                        <div class="input-group-prepend"><span class="input-group-text">-</span></div>
                        <input type="text" class="toDate form-control" name="dt" id="dt" value="<?php echo isset($_REQUEST['dt'])?$_REQUEST['dt']:''?>" placeholder="Enter to date">
                        <div class="input-group-append"><span class="input-group-text"><a href="javascript:;" onClick="$('#df,#dt').val('');"><i class="fa fa-fw fa-sync"></i></a></span></div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label> </label>
                    <div>
                        <button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
                        <a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<table class="table table-striped table-bordered">

<thead>
<tr class="bg-primary text-white">
	<th>Sr#</th>
	<th>User Name</th>
	<th>User Email</th>
	<th>User Phone</th>
	<th class="text-center">Record Date</th>
	<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
<?php
if(count($userData)>0){
	$s  =   '';
	foreach($userData as $val){
		$s++;
		?>
		<tr>
			<td><?php echo $s;?></td>
			<td><?php echo $val['username'];?></td>
			<td><?php echo $val['useremail'];?></td>
			<td><?php echo $val['userphone'];?></td>
			<td align="center"><?php echo date('Y-m-d',strtotime($val['dt']));?></td>
			<td align="center">
				<a href="edit-users.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> |
				<a href="delete.php?delId=<?php echo $val['id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
			</td>

		</tr>
		<?php
	}
}else{
	?>
	<tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
<?php } ?>
</tbody>
</table>

