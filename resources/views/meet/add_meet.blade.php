<!DOCTYPE html>
<html lang="en">
<head>
  <title>Custom Form Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
        font-family: Arial, sans-serif;
        background-image: url('/image/login5.jpg');
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-size: cover;
        background-position: center;
    }

    .container {
        max-width: 600px;
        width: 100%;
        padding: 20px;
    }

    .row {
        display: flex;
        justify-content: center;
    }

    .col-12 {
        flex: 1;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 10px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        padding: 20px;
    }

    .card-body {
        padding: 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #007bff;
        font-size: 24px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }

    input[type="text"], input[type="submit"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        box-sizing: border-box;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    input[type="text"] {
        margin-bottom: 10px;
        background-color: #f9f9f9;
    }

    input[type="text"]:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        outline: none;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 10px;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .text-danger {
        color: #dc3545;
        font-size: 14px;
    }

    .text-center {
        text-align: center;
    }
  </style>
</head>
<body>

<br><br><br>
<div class="container">
    <div class="row">
     <div class="col-12">
            <div class="card form-holder">
         <div class="card-body">
    <h1>Add A Meeting</h1>

                    @if (Session::has('error'))
                    <p class="text-danger">{{ Session::get('error') }}</p>
                    @endif

        <form action="{{ route('add_meet') }}" method="post">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" />
                            @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email" />
                            @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control" placeholder="Mobile" />
                            @if ($errors->has('mobile'))
                            <p class="text-danger">{{ $errors->first('mobile') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Topic</label>
                            <input type="text" name="topic" class="form-control" placeholder="Topic" />
                            @if ($errors->has('topic'))
                            <p class="text-danger">{{ $errors->first('topic') }}</p>
                            @endif
                        </div>

                        <div class="col-12 text-center">
                            <input type="submit" class="btn btn-primary" value="Add" />
                        </div>
                </form>
        </div>
            </div>
     </div>
    </div>
</div>

</body>
</html>
