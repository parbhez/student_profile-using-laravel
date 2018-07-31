<!DOCTYPE html>
<html>
<head>
  <title>Student Profile</title>
  <link rel="stylesheet" type="text/css" href="{{URL::to('public/css/bootstrap.min.css')}}">
</head>
<body>
  <div class="container col-md-8 mt-4">
    <div class="row">
      <div class="card">
        <div class="cart-header text-white p-4 bg-success">
          <h3>Student Profile</h3>
          <a class="btn btn-outline-secondary" href="{{URL::to('/add-student')}}">Add Student</a>
        </div>
        <div class="card-body">
              <p class="alert-success">
                <?php 
                    $message = Session::get('message');
                    if ($message) {
                      echo $message;
                      Session::put('message',null);
                    }
                 ?>
              </p>
              <table class="table">
                <thead class="thead-white">
                  <tr>
                    <th scope="col">Student Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($all_student as $student)
                  <tr>
                    <td scope="row">{{ $student->student_id }}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td>
                      <!-- <img src="public/images/{{$student->image}}" width="60px" height="60ppx"> -->
                      <img src="{{URL::to('public/images')}}/{{$student->image}}" width="60px" height="60ppx">
                    </td>
                    <td>
                      <a class="btn btn-success btn-sm" href="{{URL::to('/edit-student')}}/{{$student->student_id}}">Edit</a>
                      <a onclick="return confirm('Are You sure want to delete this data???')" class="btn btn-danger btn-sm" href="{{URL::to('/delete-student')}}/{{$student->student_id}}">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>