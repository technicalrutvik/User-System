<?php

	require_once 'assetes/php/header.php';

 ?>

 <div class="container">	
 	<div class="row">
 		<div class="col-lg-12">
 			<?php if($verified == 'Not Verified!'): ?>
 			<div class="alert alert-danger alert-dismissible text-center mt-2 m-0">
 				<button class="close" type="button" data-dismiss="alert">&times; </button>
 				<strong>Your E-mail is not Verified! We've sent you an E-mail Verification link on your E-mail,check & verify now!</strong>
 			</div>
 			<?php endif; ?>
 			<h4 class="text-center text-primary mt-2">Writes Your Notes Here & Access Anytime Anywhere! </h4>
 		</div>
 	</div>	
 	<div class="card border-primary">
 		<h5 class="card-header bg-primary d-flex justify-content-between">
 			<span class="text-light lead align-self-center">All Notes</span>
 			<a href="#" class="btn btn-light" data-toggle="modal" data-target="#addNoteModal"><i class="fas fa-plus-circle fa-lg"></i>&nbsp; Add New Note</a>
 		</h5>
 		<div class="card-body">
 			<div class="table-responsive" id="showNote">		
 				<p class="text-center lead mt-5 ">Please Wait...</p>
 			</div>
 		</div>
 	</div>
 </div>

 <!-- Start  Add New Note Modal-->
 <div class="modal fade" id="addNoteModal">
 	<div class="modal-dialog modal-dialog-centered">
 		<div class="modal-content">
 			<div class="modal-header bg-success">
 				<h4 class="modal-title text-light">Add New Note</h4>
 				<button type="button" class="close text-light" data-dismiss="modal">&times;</button>
 			</div>
 			<div class="modal-body">
 				<form action="#" method="post" id="add-note-form" class="px-3">
 					<div class="form-group">
 						<input type="text" name="title" class="form-control form-control-lg" placeholder="Enter Title" required>
 					</div>
 					<div class="form-group">
 						<textarea name="note" class="form-control form-control-lg" placeholder="Writes Your Notes Here..." rows="6" required> </textarea>
 					</div>
 					<div class="form-group">
 						<input type="submit"  name="addNote" id="addNoteBtn" value="Add Note" class="btn btn-success btn-block btn-lg">
 					</div>
 				</form>
 			</div>
 		</div>
 	</div>
 </div>
 <!-- End  Add New Note Modal-->

 <!-- Start  Edit Note Modal-->
<div class="modal fade" id="editNoteModal">
 	<div class="modal-dialog modal-dialog-centered">
 		<div class="modal-content">
 			<div class="modal-header bg-info">
 				<h4 class="modal-title text-light">Edit Note</h4>
 				<button type="button" class="close text-light" data-dismiss="modal">&times;</button>
 			</div>
 			<div class="modal-body">
 				<form action="#" method="post" id="edit-note-form" class="px-3">
 					<input type="hidden" name="id" id="id">
 					<div class="form-group">
 						<input type="text" name="title" id="title" class="form-control form-control-lg" placeholder="Enter Title" required>
 					</div>
 					<div class="form-group">
 						<textarea name="note" id="note" class="form-control form-control-lg" placeholder="Update Notes Here..." rows="6" required></textarea>
 					</div>
 					<div class="form-group">
 						<input type="submit" name="editNote" id="editNoteBtn" value="Add Note" class="btn btn-info btn-block btn-lg">
 					</div>
 				</form>
 			</div>
 		</div>
 	</div>
 </div>
 <!-- End  Edit Note Modal-->



<!-- <h1><?= basename($_SERVER['PHP_SELF']); ?></h1> -->
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<script src="https://kit.fontawesome.com/a076d05399.js"></script> 	
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">
	$(document).ready(function(){	
		//Add New Note Ajax Request
		$("#addNoteBtn").click(function(e){
			if($("#add-note-form")[0].checkValidity()){
				e.preventDefault();
				$("#addNoteBtn").val('Please Wait');

				$.ajax({
					url:'assetes/php/process.php',
					method:'post',
					data: $("#add-note-form").serialize()+'&action=add_note',
					success:function(response){
			
						$("#addNoteBtn").val('Add Note');
						$("#add-note-form")[0].reset();
						//$('#addNoteModal').modal('hide');
						Swal.fire({
							title:'Note Added Successfully',
							type: 'success'	 
						}); 
						displayAllnotes();
					}
				});
			}
		});

		//Edit Note of an User Ajax Request
		$("body").on("click",".editBtn",function(e){
			e.preventDefault();
			edit_id= $(this).attr('id');
			console.log(edit_id);

			$.ajax({
				url:'assetes/php/process.php',
				method:'post',
				data: { edit_id: edit_id },
				success:function(response){
					console.log(response);
					data = JSON.parse(response);
					console.log(data);
					$("#id").val(data.id);
					$("#title").val(data.title);
					$("#note").val(data.note);
				}
			});
		});

		//Update Note of An User Ajax Request
		 $("#editNoteBtn").click(function(e)	{
		 	if($("#edit-note-form")[0].checkValidity()){
		 		e.preventDefault();

		 		$.ajax({
		 			url:'assetes/php/process.php',
		 			method:'post',
		 			data: $("#edit-note-form").serialize()+'&action=update_note',
		 			success:function(response){
		 				//console.log(response);
		 				Swal.fire({
		 					title: 'Note Updated Successfully!',
		 					type: 'success'
		 				});
		 				$("#edit-note-form")[0].reset();
		 				//$("#editNoteModal").modal('hide');
		 				displayAllnotes();
		 			}
		 		});
		 	}
		 });


		//Delete a Note of an Ajax Request
		 $("body").on("click",".deleteBtn",function(e){
		 	 e.preventDefault();
		 	 del_id=$(this).attr('id');
		 	Swal.fire({
			 	title:'Are You Sure?',
		 	 	text: "You Won't be able to revert this!",
		 	 	icon: 'warning',
		 	 	showCancelButton: true,
		 	 	confirmButtonColor: '#3085d6',
		 	 	cancelButtonColor:'#d33',
		 		confirmButtonText: 'Yes,Delte it!'
		 	 }).then((result)=>{
		 	 	if (result.value) {
		 	 		$.ajax({
		 	 			url: 'assetes/php/process.php',
		 	 			method: 'post',
		 	 			data:{ del_id: del_id },
		 	 			success:function(response){
		 	 			Swal.fire(
		 	 			'Deleted!',
		 	 			'Your File has been deleted!',
		 	 			'success'
		 	 			)
		 	 			}	
		 	 		});
		 	 	}	
		 	 })
		 });

		//Display Note of an User in Details ajax Request
		$("body").on("click",".infoBtn",function(e){
			e.preventDefault();
			info_id=$(this).attr('id');

			$.ajax({
				url:'assetes/php/process.php',
				method: 'post',
				data:{ info_id: info_id},
				success:function(response){
					//	console.log(response);
					data= JSON.parse(response);
					Swal.fire({
						title: '<strong>Note : ID('+data.id+')</strong>',
						type: 'info',
						html: '<b>Title : </b>'+data.title+'<br><br><b>Note : </b>'+data.note+'<br><br><b>Written On : </b>'+data.created_at+'<br><br><b>Updated On : </b>'+data.updated_at,	
						showCloseButtton: true

					});
				}
			});
		}); 






		displayAllnotes();
		//Display All Note of an User

		function displayAllnotes(){
			$.ajax({
				url:'assetes/php/process.php',
				method:'post',
				data:{action:'display_notes'},
				success:function(response){
					$("#showNote").html(response);
					$("table").DataTable({
						order: [0,'desc	']
					});
				}
			});
		}
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

		//Checking user is logged in or not
		// $.ajax({
		// 	url:'assetes/php/action.php',
		// 	method:'post',
		// 	data:{action: 'checkUser'}
		// 	success:function(response){
		// 		if(response===bye){
		// 			window.location = 'index.php';
		// 		}
		// 	}
		// });

	});
</script>
</body>
</html>



