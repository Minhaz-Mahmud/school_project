<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    
    body {
      font-family: 'Roboto', Arial, sans-serif;
      background-image: url('/image/login5.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      position: relative;
      height: 100vh;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      /* background-color: rgba(0, 0, 0, 0.5); */
      z-index: 1;
    }

    .container {
      position: relative;
      z-index: 2;
      margin-top: 50px;
    }

    .card {
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-body {
      padding: 30px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); 
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
    }

    h1 {
      font-weight: 700;
      color: #333;
      margin-bottom: 30px;
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      font-weight: 500;
      color: #555;
    }

    input[type="email"],
    input[type="password"] {
      border-radius: 5px;
      border: 1px solid #ccc;
      padding: 12px;
      width: 100%;
    }

    input[type="submit"] {
      padding: 12px 48px;
      border-radius: 5px;
      border: none;
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
      transform: scale(1.05);
    }

    .text-danger {
      color: #dc3545;
    }

    .text-success {
      color: #28a745;
    }

    .signup-link {
      text-align: center;
      margin-top: 20px;
    }

    .signup-link a {
      color: #007bff;
      text-decoration: none;
    }

    .signup-link a:hover {
      text-decoration: underline;
    }

    .signup-link button {
      background: none;
      border: none;
      color: #007bff;
      padding: 0;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="overlay"></div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h1>Login as a User</h1>
            @if (Session::has('error'))
              <p class="text-danger">{{ Session::get('error') }}</p>
            @endif
            @if (Session::has('success'))
              <p class="text-success">{{ Session::get('success') }}</p>
            @endif
            <form action="{{ route('u_login') }}" method="post">
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
                <input type="submit" class="btn btn-primary" value="Login" />
              </div>
            </form>
            <p class="signup-link">Don't Have an Account? <a href="{{ route('add_user') }}"><button>Sign Up</button></a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
