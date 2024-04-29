<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }

        .form-container h1 {
            color: #007bff;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-container label {
            color: #495057;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"] {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 8px;
            margin-bottom: 15px;
        }

        .form-container input[type="file"] {
            border: 1px solid #ced4da;
            border-radius: 4px;
            background-color: #f1f1f1;
            padding: 8px;
            margin-bottom: 15px;
        }

        .form-container input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .form-container .text-danger {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <h1>Edit a Student</h1>
                    @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="post" action="{{ route('student.update', ['id' => $student]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" id="image" class="custom-file-input" accept="image/*">
                                    <label class="custom-file-label" for="image">Choose file...</label>
                                </div>
                            </div>
                            @if ($errors->has('image'))
                            <p class="text-danger">{{ $errors->first('image') }}</p>
                            @endif
                        </div>

                        
     <script>
    document.addEventListener("DOMContentLoaded", function() {
        var imageInput = document.getElementById("image");
        var currentImage = "{{ $student->image }}";

        // Check if currentImage is not empty and set the file input label
        if (currentImage.trim() !== "") {
            var fileName = currentImage.split('/').pop(); // Extract file name
            var customFileLabel = imageInput.nextElementSibling;
            customFileLabel.textContent = fileName;
        }
    });
    </script>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" value="{{ $student->name }}">
                            @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <input type="text" name="gender" id="gender" class="form-control" placeholder="Enter gender" value="{{ $student->gender }}">
                            @if ($errors->has('gender'))
                            <p class="text-danger">{{ $errors->first('gender') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="birth">Date of Birth</label>
                            <input type="text" name="birth" id="birth" class="form-control" placeholder="Enter date of birth" value="{{ $student->date_of_birth }}">
                            @if ($errors->has('birth'))
                            <p class="text-danger">{{ $errors->first('birth') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="roll">Roll</label>
                            <input type="text" name="roll" id="roll" class="form-control" placeholder="Enter roll number" value="{{ $student->roll }}">
                            @if ($errors->has('roll'))
                            <p class="text-danger">{{ $errors->first('roll') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="blood">Blood Group</label>
                            <input type="text" name="blood" id="blood" class="form-control" placeholder="Enter blood group" value="{{ $student->blood_group }}">
                            @if ($errors->has('blood'))
                            <p class="text-danger">{{ $errors->first('blood') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="religion">Religion</label>
                            <input type="text" name="religion" id="religion" class="form-control" placeholder="Enter religion" value="{{ $student->religion }}">
                            @if ($errors->has('religion'))
                            <p class="text-danger">{{ $errors->first('religion') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" value="{{ $student->email }}">
                            @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="class">Class</label>
                            <input type="text" name="class" id="class" class="form-control" placeholder="Enter class" value="{{ $student->class }}">
                            @if ($errors->has('class'))
                            <p class="text-danger">{{ $errors->first('class') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="section">Section</label>
                            <input type="text" name="section" id="section" class="form-control" placeholder="Enter section" value="{{ $student->section }}">
                            @if ($errors->has('section'))
                            <p class="text-danger">{{ $errors->first('section') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone number" value="{{ $student->phone_number }}">
                            @if ($errors->has('phone'))
                            <p class="text-danger">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
                            @if ($errors->has('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Save Student" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
