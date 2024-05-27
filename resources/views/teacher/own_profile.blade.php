
@if(session('success'))
    <script type="text/javascript">
        window.onload = function () { alert("{{ session('success') }}"); }
    </script>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            margin: 0 auto;
            display: block;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 0;
        }

        p {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .teacher-section {
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        h5 {
            color: #007bff;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 20px;
            text-align: center;
        }
        .button-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 10vh; 
}

.button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff; 
    text-decoration: none;
    border-radius: 5px;
}

    </style>
</head>
<body>


@include('layout.navigation')
<br><br><br>
    <div class="container">
        <h1>Teacher Profile</h1>

        <div class="teacher-section">
            <img src="{{ asset($user->image) }}" class="profile-image" alt="Profile Image">
            <h1>{{ $user->name }}</h1>
            <p>{{ $user->qualification }}</p>
            <p>{{ $user->gender }}</p>
            <p>{{ $user->age }}</p>
            <p>{{ $user->designation }}</p>
            <p>{{ $user->email }}</p>
        </div>

        <div class="teacher-section">
            <h5>Meeting Request Details</h5>
            <?php
                $r = App\Models\Schedule::where('teacher_id', $user->id)->first();
            ?>

            @if(isset($r))
                <p>Name: {{ $r->name }}</p>
                <p>Email: {{ $r->email }}</p>
                <p>Mobile: {{ $r->mobile }}</p>
                <p>Topic: {{ $r->topic }}</p>
               <a href=" {{url('add_reply/'.$r->request_id)}}">Press</a>
            
            @else 
                <p>No request to show</p>
            @endif
        </div>
    </div>
    <div class="button-container">
    <a href="{{route('teacher.edit',['teacher'=>$user])}}" class="button">Edit Profile</a>
</div>
</body>
</html>
