<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for changing table color */
        .custom-table {
            /* background-color: #f8f9fa; */
            background-color: #f8f9fa; /* Change this color code to your desired color */
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-800">
    <div class="container mx-auto px-4 py-8">
        <!-- Register Student Button -->
        <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            Register a student
        </a>
        <br><br>
        <!-- Success Message -->
        <div>
            @if(session()->has('success'))
                <div>
                    {{session('success')}}
                </div>
            @endif
        </div>
        <br><br><br><br><br>
        <!-- Student Information Table -->
        <h2 class="text-lg font-semibold mb-4">Student Information</h2>
        <table class="table table-striped table-bordered custom-table">
            <thead class="thead-dark">
                <!-- Table Header -->
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
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table Body with student information -->
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
                    <td><a href="{{ route('student.edit', ['student' => $student]) }}" class="text-blue-500">Edit</a></td>
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
        <a href="{{ route('add_marks') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            Add Student Marks
        </a>
        <br><br><br>
        <!-- Student Marks Table -->
        <h2 class="text-lg font-semibold mb-4">Student Marks</h2>
        <table class="table table-striped table-bordered custom-table">
            <thead class="thead-dark">
                <!-- Table Header -->
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
                    <td>{{ $mark->dew}}</td>

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
</body>
</html>
