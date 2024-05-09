<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Profile</title>
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
            margin: 150px auto 20px; /* Adjust margin-top for more space from the top */
            padding: 0 15px;
        }

        .card-shadow {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .profile-image {
            width: 320px; /* Adjust as needed */
            height: 320px; /* Adjust as needed */
            border-radius: 50%;
            margin: 0 auto 20px; /* Center horizontally and add margin at the bottom */
            display: block;
            object-fit: cover;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
            text-align: center;
            color: #333;
        }

        p {
            margin-bottom: 10px;
            color: #555;
        }

        strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    @include('layout.navigation')

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card-shadow">
                    <h1>Teacher Profile</h1>
                    <div class="text-center mb-4">
                        <img src="{{ asset($teacher->image) }}" class="profile-image" alt="Profile Image">
                    </div>
                    <h1>{{ $teacher->name }}</h1>
                    <p><strong>Qualification:</strong> {{ $teacher->qualification }}</p>
                    <p><strong>Gender:</strong> {{ $teacher->gender }}</p>
                    <p><strong>Age:</strong> {{ $teacher->age }}</p>
                    <p><strong>Designation:</strong> {{ $teacher->designation }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
