<?php

require_once 'assets/php/admin-header.php';
require_once 'assets/php/admindb.php';
$count = new Admin();

?>
	<div class="row">
		<div class="col-lg-12">
		<!-- <h1><?= basename($_SERVER['PHP_SELF']) ?></h1> -->
			<div class="card-deck mt-3 text-light text-center font-weight-bold">
				
				<div class="card bg-primary">
					<div class="card-header">Total Users</div>
					<div class="card-body">
						<h1 class="display-4">
							<?= $count->totalCount('users'); ?> 
						</h1>
					</div>
				</div>

				<div class="card bg-warning">
					<div class="card-header">Verified Users</div>
					<div class="card-body">
						<h1 class="display-4">
							<?= $count->verified_users(1);  ?>
						</h1>
					</div>
				</div>

				<div class="card bg-success">
					<div class="card-header">Unverified Users</div>
					<div class="card-body">
						<h1 class="display-4">
							<?= $count->verified_users(0);  ?>
						</h1>
					</div>
				</div>

				<div class="card bg-danger">
					<div class="card-header">Websites Hits</div>
					<div class="card-body">
						<h1 class="display-4">
							<?php $data=$count->site_hits(); echo $data['hits'];  ?>
						</h1>
					</div>
				</div>

				
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card-deck mt-3 text-light text-center font-weight-bold">						
				<div class="card bg-danger">
					<div class="card-header">Total Notes</div>
					<div class="card-body">
						<h1 class="display-4">
							<?= $count->totalCount('notes'); ?> 
						</h1>
					</div>
				</div>

				<div class="card bg-success">
					<div class="card-header">Total Feedback</div>
					<div class="card-body">
						<h1 class="display-4">
							<?= $count->totalCount('feedback'); ?> 
						</h1>
					</div>
				</div>

				<div class="card bg-info">
					<div class="card-header">Total Notification</div>
					<div class="card-body">
						<h1 class="display-4">
							<?= $count->totalCount('notification'); ?> 
						</h1>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card-deck my-3">
				
				<div class="card border-success">
					<div class="card-header bg-success text-center text-white lead">Male/Female User's Percentages
					</div>
					<div id="chatone" style="width: 99%; height: 400px;"></div>
				</div>

				<div class="card border-info">
					<div class="card-header bg-info text-center text-white lead">Verified/Unverified User's Percentages  
					</div>
					<div id="chatone" style="width: 99%; height: 400px;"></div>
				</div>
				
			</div>
		</div>
	</div>


	<!-- Footer Area -->
		</div>
	</div>
</div>
<script type="text/javascript">
	checkNotification();
		//Check Notification
		function checkNotification(){
			$.ajax({
				url:'assets/php/adminaction.php',
				method:'post',
				data:{ action: 'checkNotification'},
				success:function(response){
					//console.log(response);
					$("#checkNotification").html(response);
				}
			});
		}
</script>
</body>
</html>