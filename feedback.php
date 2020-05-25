<?php
	require_once 'assetes/php/header.php';
 ?>

 <div class="container ">
	<div class="row justify-content-center">
		<div class="col-lg-8 mt-3">
			 <?php if($verified == 'Verified!'): ?>
				<div class="card border-primary">
					<div class="card-header lead text-center bg-primary text-white">Send Feedback to Admin!</div>
					<div class="card-body">
						<form action="#" method="post" class="px-4" id="feedback-form">
							
							<div class="form-group">
								<input type="text" name="subjct" placeholder="Write your Subject" class=" form-control form-control-lg  rounded-0" required>
							</div>

							<div class="form-group">
								<textarea name="feedback" class="form-control form-control-lg  rounded-0" placeholder="Write your Feedback Here..." rows="8" required>
								</textarea>
							</div>

							<div class="form-group">
								<input type="submit" name="feedBackBtn" id="feedbackBtn" value="Send Feedback" class="btn btn-block btn-lg rounded-0">
							</div>

						</form>
					</div>
				</div>
			<?php else: ?>
				<h1 class="text-center text-secondary mt-5">Verify Your E-mail First to Send Feedback to Admin</h1>
			<?php endif; ?>
		</div>
	</div>
</div>


<!-- <h1><?= basename($_SERVER['PHP_SELF']); ?></h1> -->
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<script src="https://kit.fontawesome.com/a076d05399.js"></script> 	

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>	
<script type="text/javascript">
	$(document).ready(function(){

		//Send Feedback to Admin Ajax Request
		$("#feedbackBtn").click(function(e){
			if($("#feedback-form")[0].checkValidity()){
				e.preventDefault();
				$(this).val('Please Wait...');
				$.ajax({
					url:'assetes/php/process.php',
					method:'post',
					data:$("#feedback-form").serialize()+'&action=feedbackk',
					success:function(response){
						console.log(response);

						$("#feedback-form")[0].reset();
						$("#feedbackBtn").val("Send Feedback");
						Swal.fire({
							title:'Feedback Successfully sent to the Admin',
							type:'success'
						})
					}
				});
			}
		});
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
	});

</script>

</body>
</html>



