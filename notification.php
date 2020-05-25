<?php

	require_once 'assetes/php/header.php';

 ?>
<div class="container">
	<div class="row justify-content-center my-2">
		<div class="col-lg-6 mt-4" id="showAllNotification">
			
		</div>
	</div>
</div>






<!-- <h1><?= basename($_SERVER['PHP_SELF']); ?></h1> -->
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<script src="https://kit.fontawesome.com/a076d05399.js"></script> 	

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		fetchnotification();
		//Fetch Notification
		function fetchnotification(){
			$.ajax({
				url:'assetes/php/process.php',
				method:'post',
				data:{action: 'fetchNotification'},
				success:function(response){
					console.log(response);
					$("#showAllNotification").html(response);
				}
			});
		}
		CheckNotification();
		//Check Notification
		function CheckNotification(){
			$.ajax({
				url:'assetes/php/process.php',
				method:'post',
				data:{action: 'CheckNotification'},
				success:function(response){
					//console.log(response);
					$("#checkNotofication").html(response);
				}
			});
		}
	
		//Remove Notification
		$("body").on("click",".close",function(e){
			e.preventDefault();
			notification_id = $(this).attr('id');
			$.ajax({
				url:'assetes/php/process.php',
				method:'post',
				data: { notification_id: notification_id},
				success:function(response){
					CheckNotofication();
					fetchNotification();
				}
			});
		});



	});
</script>
</body>
</html>



