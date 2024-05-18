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
            background-color: #f8f9fa; /* Change this color code to your desired color */
            margin-top: 30px; /* Add space from the top */
        }
    </style>
</head>
<body>
    <div class="container">
        <table class="table table-striped table-bordered custom-table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Previous School</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($a as $admission)
                <tr>
                    <td>{{ $admission->id }}</td>
                    <td>{{ $admission->name }}</td>
                    <td>{{ $admission->class }}</td>
                    <td>{{ $admission->gender }}</td>
                    <td>{{ $admission->age }}</td>
                    <td>{{ $admission->previous_school }}</td>
                    <td>
                        <form method="post" action="{{ route('admission.destroy', ['admission' => $admission]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
