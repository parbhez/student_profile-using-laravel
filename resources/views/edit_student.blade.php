<!DOCTYPE html>
<html>
<head>
	<title>Persoanl information</title>
	<link rel="stylesheet" type="text/css" href="{{URL::to('public/css/bootstrap.min.css')}}">
</head>
<body>
	<div class="container mt-4 col-md-8">
		<div class="row">
			<div class="cart">
				<div class="cart-header p-4 text-white bg-info">
					<h3>Edit Student Profile</h3>
				</div>
					<div class="cart-body">
						<p class="alert-success">
							<?php 
								$message = Session::get('message');
								if ($message) {
									echo $message;
									Session::put('message',null);
								}
							 ?>
						</p> 
						<form action="{{URL::to('/update-student')}}/{{$edit_student->student_id}}" method="post" enctype="multipart/form-data">
						@csrf
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" class="form-control" value="{{$edit_student->name}}">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" id="email" class="form-control" value="{{$edit_student->email}}">
							</div>
			
							<div class="form-group">
								<label for="image">Image</label>
								<input type="file" name="image" id="image" class="form-control">
							<div>
								<img src="{{URL::to('public/images')}}/{{$edit_student->image}}" width="50px" height="40px">
								<!-- <img src="public/images/{{$edit_student->image}}" width="50px" height="40px"> -->
							</div>	
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-outline-info">Submit</button>
							</div>
						</form>
					</div>
			</div>
		</div>
	</div>
</body>
</html>