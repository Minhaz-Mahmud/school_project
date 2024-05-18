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
    <div class="container mt-5">
        <!-- Add Notice Button -->
        <a href="{{ route('add_notice') }}" class="btn btn-primary rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            Add Notice
        </a>
        <br><br><br>
        <!-- Notice Table -->
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Header</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through notices -->
                @foreach($notice as $note)
                <tr>
                    <td>{{ $note->id }}</td>
                    <td>{{ $note->head }}</td>
                    <td>{{ $note->des }}</td>
                    <td>
                        <a href="{{ route('notice.edit', ['notice' => $note]) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('notice.destroy', ['notice' => $note]) }}">
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
