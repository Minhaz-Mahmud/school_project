@if(session('success'))
    <script type="text/javascript">
        window.onload = function () { alert("{{ session('success') }}"); }
    </script>
@endif


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('/image/login6.jpg');
      margin: 0;
      padding: 0;
    


    }

    .container {
      max-width: 600px;
      margin: 120px auto; 
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }

    h1 {
      font-weight: 600;
      color: #333;
      text-align: center;
      margin-bottom: 30px;
    }

    label {
      font-weight: 500;
      display: block;
      margin-bottom: 10px;
    }

    input[type="text"],
    input[type="email"] {
      border-radius: 5px;
      border: 1px solid #ccc;
      padding: 12px;
      width: 100%;
      margin-bottom: 20px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      padding: 12px 48px;
      border-radius: 5px;
      border: none;
      background-color: red;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s;
      display: block;
      margin: 0 auto;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    .text-danger {
      color: #dc3545;
    }
  </style>
</head>
<body>

@include('layout.navigation')

<div class="container">
  <h1>Register for Admission</h1>

  @if (Session::has('error'))
    <p class="text-danger">{{ Session::get('error') }}</p>
  @endif

  <form action="{{ route('admission') }}" method="post" autocomplete="off">
    @csrf
    @method('post')
    <div>
      <label for="name">Name</label>
      <input type="text" name="name" id="name" placeholder="Name" required />
      @if ($errors->has('name'))
        <p class="text-danger">{{ $errors->first('name') }}</p>
      @endif
    </div>
    <div>
      <label for="class">Class</label>
      <input type="text" name="class" id="class" placeholder="Class" required />
      @if ($errors->has('class'))
        <p class="text-danger">{{ $errors->first('class') }}</p>
      @endif
    </div>

    <div>
      <label for="gender">Gender</label>
      <input type="text" name="gender" id="gender" placeholder="Gender" required />
      @if ($errors->has('gender'))
        <p class="text-danger">{{ $errors->first('gender') }}</p>
      @endif
    </div>
    <div>
      <label for="age">Age</label>
      <input type="text" name="age" id="age" placeholder="Age" required />
      @if ($errors->has('age'))
        <p class="text-danger">{{ $errors->first('age') }}</p>
      @endif
    </div>
    <div>
      <label for="previous_school">Previous School</label>
      <input type="text" name="previous_school" id="previous_school" placeholder="Previous School" required />
      @if ($errors->has('previous_school'))
        <p class="text-danger">{{ $errors->first('previous_school') }}</p>
      @endif
    </div>

    <input type="submit" value="Register" />
  </form>
</div>

</body>
</html>
