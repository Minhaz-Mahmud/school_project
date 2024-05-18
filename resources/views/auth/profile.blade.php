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
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 70px auto;
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

        .profile-section {
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

.dew {
    text-align: center;
    margin: 20px;
}

.dew-details {
    margin-bottom: 10px;
}

.pay-button-container {
    text-align: center;
}

.pay-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ff0000; /* Red color */
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.pay-button:hover {
    background-color: #cc0000; /* Darker red for hover effect */
}



    </style>
</head>
<body>
@include('layout.navigation')
   <h1>Student Profile</h1>
    <div class="container">
        <img src="{{ asset($user->image) }}" class="profile-image" alt="Profile Image">
        <h1>{{ $user->name }}</h1>
        <p>{{ $user->email }}</p>

        <div class="profile-section">
            <h5>Personal Information</h5>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Gender:</strong> {{ $user->gender }}</p>
            <p><strong>Date of Birth:</strong> {{ $user->date_of_birth }}</p>
        </div>

        <div class="profile-section">
            <h5>Academic Information</h5>
            <p><strong>Roll:</strong> {{ $user->roll }}</p>
            <p><strong>Blood Group:</strong> {{ $user->blood_group }}</p>
            <p><strong>Religion:</strong> {{ $user->religion }}</p>
            <p><strong>Class:</strong> {{ $user->class }}</p>
            <p><strong>Section:</strong> {{ $user->section }}</p>
        </div>

        <!-- Assuming $user contains the user data -->
        <!-- Fetching marks data -->
        <?php
            $marks = App\Models\Marks::where('id', $user->id)->first();
        ?>
        @if(isset($marks))
        <div class="profile-section">
            <h5>Marks</h5>
            <p><strong>Exam:</strong> {{ $marks->exam }}</p>
            <p><strong>Bangla:</strong> {{ $marks->bangla }}</p>
            <p><strong>English:</strong> {{ $marks->english }}</p>
            <p><strong>Math:</strong> {{ $marks->math }}</p>
            <p><strong>Science:</strong> {{ $marks->science }}</p>
        </div>

        <div class="dew">
    <h5>Dews</h5>
    <div class="dew-details">
        <p><strong>Payable Dews: </strong>{{ $marks->dew }}  <strong>TK</strong> </p>
        <form id="payForm" action="{{ route('updateAndCheckout',['id'=>$marks]) }}" method="POST">
            @csrf
            <input type="hidden" name="dewId" value="{{ $marks->id }}">
            <button type="submit" class="pay-button">Pay</button>
        </form>
    </div>
</div>


        
        @endif
    </div>
    <div class="button-container">
    <a href="{{ route('student.edit', ['student' => $user]) }}" class="button">Edit Profile</a>
</div>

</body>
</html>
