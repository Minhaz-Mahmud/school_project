@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">

            <div class="col-md-4 offset-md-4">
                <div class="card form-holder">
                    <div class="card-body">
                        <h1>Register</h1>

                        @if (Session::has('error'))
                            <p class="text-danger">{{ Session::get('error') }}</p>
                        @endif

                        <form action="{{ route('register') }}" method="post" autocomplete="off">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="name" />
                                @if ($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                <input type="text" name="gender" class="form-control" placeholder="gender" />
                                @if ($errors->has('gender'))
                                    <p class="text-danger">{{ $errors->first('gender') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="text" name="birth" class="form-control" placeholder="birth" />
                                @if ($errors->has('birth'))
                                    <p class="text-danger">{{ $errors->first('birth') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Roll</label>
                                <input type="text" name="roll" class="form-control" placeholder="roll" />
                                @if ($errors->has('roll'))
                                    <p class="text-danger">{{ $errors->first('roll') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Blood Group</label>
                                <input type="text" name="blood" class="form-control" placeholder="blood" />
                                @if ($errors->has('blood'))
                                    <p class="text-danger">{{ $errors->first('blood') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Religion</label>
                                <input type="text" name="religion" class="form-control" placeholder="religion" />
                                @if ($errors->has('religion'))
                                    <p class="text-danger">{{ $errors->first('religion') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email"  autocomplete="off"/>
                                @if ($errors->has('email'))
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Class</label>
                           <input type="text" name="class" class="form-control" placeholder="class" />
                                @if ($errors->has('class'))
                                    <p class="text-danger">{{ $errors->first('class') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Section</label>
                                <input type="text" name="section" class="form-control" placeholder="section" />
                                @if ($errors->has('section'))
                                    <p class="text-danger">{{ $errors->first('section') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone" class="form-control" placeholder="name" />
                                @if ($errors->has('phone'))
                                    <p class="text-danger">{{ $errors->first('phone') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" />
                                @if ($errors->has('password'))
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                          

                           
                                <div class="col-4 text-right">
                                    <input type="submit" class="btn btn-primary" value=" Register " />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection