<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional Bootstrap theme -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-theme.min.css" rel="stylesheet">
    <style>
        /* Additional custom styles can be added here */
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">User Profile</h1>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Personal Information</h5>
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-text"><strong>Name:</strong> {{ $user->name }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                        <p class="card-text"><strong>Gender:</strong> {{ $user->gender }}</p>
                        <p class="card-text"><strong>Date of Birth:</strong> {{ $user->date_of_birth }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text"><strong>Roll:</strong> {{ $user->roll }}</p>
                        <p class="card-text"><strong>Blood Group:</strong> {{ $user->blood_group }}</p>
                        <p class="card-text"><strong>Religion:</strong> {{ $user->religion }}</p>
                        <p class="card-text"><strong>Class:</strong> {{ $user->class }}</p>
                    </div>
                </div>
                <h5 class="card-title mt-4">Contact Information</h5>
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-text"><strong>Section:</strong> {{ $user->section }}</p>
                        <p class="card-text"><strong>Phone Number:</strong> {{ $user->phone_number }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
