<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admissions</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .custom-table {
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }
        .table thead th {
            background-color: #343a40;
            color: #ffffff;
        }
        .btn-custom {
            padding: 5px 10px;
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
    </style>
</head>
<body>
    <div class="container">
        <h2 class="section-title">Student Admissions</h2>
        <table class="table table-striped table-bordered custom-table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Previous School</th>
                    <th>Reply</th>
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
                    <td><a href="{{ url('admission_add_reply/'.$admission->request_id) }}" class="btn btn-custom btn-sm">Reply</a></td>
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
