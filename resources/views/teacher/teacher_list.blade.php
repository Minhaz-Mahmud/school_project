<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .consult-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #FF2D20;
            color: #FFFFFF;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .consult-btn:hover {
            background-color: #E30000;
            color: #FFFFFF;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Teacher List</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teacher as $teacher)
                <tr>
                    <td>{{ $teacher->id }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td><a href="{{ route('teacher.profile', ['teacher' => $teacher->id]) }}" class="btn btn-primary">Details</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container text-center">
        <a href="{{ route('add_meet') }}" class="consult-btn">Consult With a Teacher</a>
    </div>
</body>
</html>
