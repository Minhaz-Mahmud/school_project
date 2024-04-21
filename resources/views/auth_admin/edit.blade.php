<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit a Admin</h1>

    <div>
      @if($errors->any())
      <ul>
        @foreach($errors->all() as $error)
           <li>{{$error}}</li>
        @endforeach
      </ul>
      @endif
    </div>

    <form method="post" action="{{route('admin.update',['admin'=>$admin])}}">
       @csrf
       @method('put')   
       <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="username" class="form-control" placeholder="username" value="{{$admin->username}}" />
                                @if ($errors->has('username'))
                                    <p class="text-danger">{{ $errors->first('username') }}</p>
                                @endif
                            </div>


                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email"   value="{{$admin->email}}" />
                                @if ($errors->has('email'))
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"  value="{{$admin->password}}" />
                                @if ($errors->has('password'))
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                          

      <div>
        <input type="submit" value="Save Admin Info">
      </div>
    </form>
</body>
</html>