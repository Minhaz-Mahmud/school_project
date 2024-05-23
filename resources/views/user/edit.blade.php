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

    <form method="post" action="{{route('user.update',['id'=>$user->id])}}">
       @csrf
       @method('put')   
       <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="name" value="{{$user->name}}" />
                                @if ($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>


                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email"   value="{{$user->email}}" />
                                @if ($errors->has('email'))
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"  value="{{$user->password}}" />
                                @if ($errors->has('password'))
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                          

      <div>
        <input type="submit" value="Save User Info">
      </div>
    </form>
</body>
</html>