<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher List</title>
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <style>
        /* Custom CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 960px;
            margin: 150px auto 10px; /* Adjusted margin */
            padding: 0 15px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .consult-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: green;
            color: #FFFFFF;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .consult-btn:hover {
            background-color: #E30000;

            
        }
    </style>
</head>
<body>
    @include('layout.navigation')
    <div class="container">
        <h1>Teacher List</h1>
        <table>
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
                    <td><a href="{{ route('teacher.profile', ['teacher' => $teacher->id]) }}" class="consult-btn">Details</a></td>
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
