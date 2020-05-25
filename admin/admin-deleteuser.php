<?php

require_once 'assets/php/admin-header.php';

?>
	<div class="row">
		<!-- <h1><?= basename($_SERVER['PHP_SELF']) ?></h1> -->
		<div class="col-lg-12">
			<div class="card my-2 border-danger">
				<div class="card-header bg-danger text-white">
					<h4 class="m-0">Total Deleted Users</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive" id="showAllDeletedUser">
						<p class="text-center align-self-center">Please Wait</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer Area -->
		</div>
	</div>
</div>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">
	$(document).ready(function(){
		
		fetchAllDeletedUser();
		function fetchAllDeletedUser(){
			$.ajax({
				url:'assets/php/adminaction.php',
				method:'post',
				data:{ action: 'fetchAllDeletedUser' },
				success:function(response){
					//console.log(response);
					$("#showAllDeletedUser").html(response);
					 $("table").DataTable({
					 	order: [0,'desc']
					 });	
				}
			});
		} 

		//Restore Deleted an User Ajax Request
		 $("body").on("click",".restoreUserIcon",function(e){
		 	 e.preventDefault();
		 	 res_id=$(this).attr('id');
		 	Swal.fire({
			 	title:'Are you sure want Restore this User?',
		 	 	
		 	 	type: 'warning',
		 	 	showCancelButton: true,
		 	 	confirmButtonColor: '#3085d6',
		 	 	cancelButtonColor:'#d33',
		 		confirmButtonText: 'Yes,Restore it!'
		 	 }).then((result) => {
		 	 	if (result.value) {
		 	 		$.ajax({
		 	 			url: 'assets/php/adminaction.php',
		 	 			method: 'post',
		 	 			data:{ res_id: res_id },
		 	 			success:function(response){
			 	 			Swal.fire(
			 	 			'Restored!',
			 	 			'User Restored deleted!',
			 	 			'success'
			 	 			)
			 	 			fetchAllDeletedUser();	
		 	 			}
		 	 		});
		 	 	}	
		 	 })
		 });
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
	});


		

</script>




</body>
</html>