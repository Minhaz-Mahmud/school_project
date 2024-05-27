<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .custom-table {
            background-color: #ffffff; 
            border-radius: 10px; 
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }
        .table thead th {
            background-color: #343a40;
            color: #ffffff;
        }
        .btn-custom {
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .section-title {
            margin-bottom: 20px;
            font-size: 1.5rem;
            font-weight: 700;
        }
        .message {
            padding: 10px 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-800">
    <div class="container mx-auto px-4 py-8">
        <a href="{{ route('register') }}" class="btn btn-custom">
            Register a Student
        </a>
        <br><br>
        <div>
            @if(session()->has('success'))
                <div class="message">
                    {{session('success')}}
                </div>
            @endif
        </div>
        <br>
        <h2 class="section-title">Student Information</h2>
        <table class="table table-striped table-bordered custom-table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Roll</th>
                    <th>Blood Group</th>
                    <th>Religion</th>
                    <th>Email</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Phone Number</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td><img src="{{ asset($student->image) }}" style="width:70px; height:70px" alt="img"></td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->date_of_birth }}</td>
                    <td>{{ $student->roll }}</td>
                    <td>{{ $student->blood_group }}</td>
                    <td>{{ $student->religion }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->class }}</td>
                    <td>{{ $student->section }}</td>
                    <td>{{ $student->phone_number }}</td>
                    <td>
                        <form method="post" action="{{ route('student.destroy', ['student' => $student]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
        <!-- Add Student Marks Button -->
        <a href="{{ route('add_marks') }}" class="btn btn-custom">
            Add Student Marks
        </a>
        <br><br>
        <h2 class="section-title">Student Marks</h2>
        <table class="table table-striped table-bordered custom-table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Exam Name</th>
                    <th>Bangla</th>
                    <th>English</th>
                    <th>Math</th>
                    <th>Science</th>
                    <th>Payable Dews</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table Body with student marks -->
                @foreach($a as $mark)
                <tr>
                    <td>{{ $mark->id }}</td>
                    <td>{{ $mark->exam }}</td>
                    <td>{{ $mark->bangla }}</td>
                    <td>{{ $mark->english }}</td>
                    <td>{{ $mark->math }}</td>
                    <td>{{ $mark->science }}</td>
                    <td>{{ $mark->dew }}</td>
                    <td><a href="{{ route('marks.edit', ['marks' => $mark]) }}" class="text-blue-500">Edit</a></td>
                    <td>
                        <form method="post" action="{{ route('marks.destroy', ['marks' => $mark]) }}">
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
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
