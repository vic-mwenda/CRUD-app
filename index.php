<?php
require_once "assets/header.php";

?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-xl-3">
			<a href="add-user.php">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <p class="m-b-0">ADD EMPLOYEE<span class="text-center"></span></p>
                </div>
            </div>
			</a>
        </div>

        <div class="col-md-4 col-xl-3">
			<a href="browse-users.php">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <p class="m-b-0 text-center">VIEW EMPLOYEES</p>
                </div>
            </div>
			</a>
        </div>

		<div class="col-md-4 col-xl-3">
			<a href="edit-users.php">
				<div class="card bg-c-green order-card">
					<div class="card-block">
						<p class="m-b-0 text-center">EDIT EMPLOYEE RECORD</p>
					</div>
				</div>
			</a>
		</div>

	</div>
</div>

<style type="text/css">
	body{
	margin-top:20px;
    background:#FAFAFA;
}
.order-card {
	color: #fff;
}

.bg-c-blue {
	background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.bg-c-green {
	background: linear-gradient(45deg,#2ed8b6,#59e0c5);
}

.bg-c-yellow {
	background: linear-gradient(45deg,#FFB64D,#ffcb80);
}

.bg-c-pink {
	background: linear-gradient(45deg,#FF5370,#ff869a);
}


.card {
	border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
	padding: 25px;
}
	.card:hover{
		transform: scale(1.05);
		box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
	}

	.order-card i {
	font-size: 26px;
}

</style>

<script type="text/javascript">

</script>
</body>
</html>
