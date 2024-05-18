<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <style>
    /* Custom Styling */
    body {
      /* font-family: Arial, sans-serif;
      background-color: #f8f9fa; */
      font-family: Arial, sans-serif;
      /* Set background image */
      background-image: url('/image/login5.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }
    
    .container {
      margin-top: 50px;
    }

    .card {
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-body {
      padding: 30px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); 

    }

    h1 {
      font-weight: 600;
      color: #333;
      margin-bottom: 30px;
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      font-weight: 500;
    }

    input[type="email"],
    input[type="password"] {
      border-radius: 5px;
      border: 1px solid #ccc;
      padding: 12px;
      width: 100%;
    }

    input[type="submit"] {
      padding: 12px 48px; /* Doubled the padding */
      border-radius: 5px;
      border: none;
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    .text-danger {
      color: #dc3545;
    }

    .text-success {
      color: #28a745;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h1>Login as a Student</h1>
            @if (Session::has('error'))
              <p class="text-danger">{{ Session::get('error') }}</p>
            @endif
            @if (Session::has('success'))
              <p class="text-success">{{ Session::get('success') }}</p>
            @endif
            <form action="{{ route('login') }}" method="post">
              @csrf
              @method('post')
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" />
                @if ($errors->has('email'))
                  <p class="text-danger">{{ $errors->first('email') }}</p>
                @endif
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" />
                @if ($errors->has('password'))
                  <p class="text-danger">{{ $errors->first('password') }}</p>
                @endif
              </div>
              <div class="text-center">
                <div class="col-12">
                  <input type="submit" class="btn btn-primary" value="Login" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
