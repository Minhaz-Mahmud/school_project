<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-shadow {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-image {
            width: 320px; /* Adjust as needed */
            height: 320px; /* Adjust as needed */
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card card-shadow">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="{{ asset($teacher->image) }}" class="img-fluid rounded-circle profile-image" alt="Profile Image">
                        </div>
                        <h1 class="text-center">{{ $teacher->name }}</h1>
                        <p><strong>Qualification:</strong> {{ $teacher->qualification }}</p>
                        <p><strong>Gender:</strong> {{ $teacher->gender }}</p>
                        <p><strong>Age:</strong> {{ $teacher->age }}</p>
                        <p><strong>Designation:</strong> {{ $teacher->designation }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
