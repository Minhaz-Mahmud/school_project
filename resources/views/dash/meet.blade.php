<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Meeting Requests</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Topic</th>
                    <th>Approve</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($meet as $meeting)
                <tr>
                    <td>{{ $meeting->id }}</td>
                    <td>{{ $meeting->name }}</td>
                    <td>{{ $meeting->email }}</td>
                    <td>{{ $meeting->mobile }}</td>
                    <td>{{ $meeting->topic }}</td>
                    <td><a href="{{ route('approve_meet', ['id' => $meeting->id]) }}" class="btn btn-success">Approve</a></td>
                    <td>
                        <form method="post" action="{{ route('meet.destroy', ['meet' => $meeting]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h1>Schedule Table</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Teacher Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Topic</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($a as $schedule)
                <tr>
                    <td>{{ $schedule->teacher_id }}</td>
                    <td>{{ $schedule->name }}</td>
                    <td>{{ $schedule->email }}</td>
                    <td>{{ $schedule->mobile }}</td>
                    <td>{{ $schedule->topic }}</td>
                    <td>
                        <form method="post" action="{{ route('meet.destroy2', ['meet' => $schedule]) }}">
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
