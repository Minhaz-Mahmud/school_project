@if(session('success'))
    <script type="text/javascript">
        window.onload = function () { alert("{{ session('success') }}"); }
    </script>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('add_teacher') }}" class="btn btn-primary mb-3">Add a Teacher</a>
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Qualification</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Designation</th>
                    <!-- <th>Edit</th> -->
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teacher as $teacher)
                    <tr>
                        <td>{{$teacher->id}}</td>
                        <td><img src="{{asset($teacher->image)}}" style="width:70px; height:70px" alt="img"></td>
                        <td>{{$teacher->name}}</td>
                        <td>{{$teacher->qualification}}</td>
                        <td>{{$teacher->gender}}</td>
                        <td>{{$teacher->age}}</td>
                        <td>{{$teacher->designation}}</td>
                        <!-- <td><a href="{{route('teacher.edit',['teacher'=>$teacher])}}" class="btn btn-primary">Edit</a></td> -->
                        <td>
                            <form method="post" action="{{route('teacher.destroy',['teacher'=>$teacher])}}" onsubmit="return confirm('Are you sure you want to delete this teacher?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
