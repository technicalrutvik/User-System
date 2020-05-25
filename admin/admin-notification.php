<?php

require_once 'assets/php/admin-header.php';

?>
	<div class="row">
		<!-- <h1><?= basename($_SERVER['PHP_SELF']) ?></h1> -->
		<div class="col-lg-6 mt-4" id="showNotification">
			
		</div>
	</div>
	<!-- Footer Area -->
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		//Fetch Notification Ajax Request

		fetchNotification();
		function fetchNotification(){
			$.ajax({
				url:'assets/php/adminaction.php',
				method:'post',
				data: {action: 'fetchNotification' },
				success:function(response){
					// console.log(response);
					$("#showNotification").html(response)
				}
			});
		}
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
		//Remove Notification Ajax Request
		$("body").on("click",".close",function(e){
			e.preventDefault();

			notification_id = $(this).attr('id');

			$.ajax({
				url:'assets/php/adminaction.php',
				method:'post',
				data: {notification_id: notification_id},
				success:function(response){
					console.log(response);
					fetchNotification();
					checkNotification();
				}
			});
		});
	});
</script>

</body>
</html>