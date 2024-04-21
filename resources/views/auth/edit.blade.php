<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit a Student</h1>

    <div>
      @if($errors->any())
      <ul>
        @foreach($errors->all() as $error)
           <li>{{$error}}</li>
        @endforeach
      </ul>
      @endif
    </div>

    <form method="post" action="{{route('student.update',['student'=>$student])}}">
       @csrf
       @method('put')   
       <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="name" value="{{$student->username}}" />
                                @if ($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                <input type="text" name="gender" class="form-control" placeholder="gender"   value="{{$student->gender}}"  />
                                @if ($errors->has('gender'))
                                    <p class="text-danger">{{ $errors->first('gender') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="text" name="birth" class="form-control" placeholder="birth"  value="{{$student->date_of_birth}}"  />
                                @if ($errors->has('birth'))
                                    <p class="text-danger">{{ $errors->first('birth') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Roll</label>
                                <input type="text" name="roll" class="form-control" placeholder="roll"  value="{{$student->roll}}" />
                                @if ($errors->has('roll'))
                                    <p class="text-danger">{{ $errors->first('roll') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Blood Group</label>
                                <input type="text" name="blood" class="form-control" placeholder="blood"  value="{{$student->blood_group}}" />
                                @if ($errors->has('blood'))
                                    <p class="text-danger">{{ $errors->first('blood') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Religion</label>
                                <input type="text" name="religion" class="form-control" placeholder="religion"  value="{{$student->religion}}"  />
                                @if ($errors->has('religion'))
                                    <p class="text-danger">{{ $errors->first('religion') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email"   value="{{$student->email}}" />
                                @if ($errors->has('email'))
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Class</label>
                           <input type="text" name="class" class="form-control" placeholder="class"  value="{{$student->class}}" />
                                @if ($errors->has('class'))
                                    <p class="text-danger">{{ $errors->first('class') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Section</label>
                                <input type="text" name="section" class="form-control" placeholder="section"  value="{{$student->section}}"  />
                                @if ($errors->has('section'))
                                    <p class="text-danger">{{ $errors->first('section') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone" class="form-control" placeholder="name"  value="{{$student->phone_number}}"  />
                                @if ($errors->has('phone'))
                                    <p class="text-danger">{{ $errors->first('phone') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"  value="{{$student->password}}" />
                                @if ($errors->has('password'))
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                          

      <div>
        <input type="submit" value="Save a New Student">
      </div>
    </form>
</body>
</html>