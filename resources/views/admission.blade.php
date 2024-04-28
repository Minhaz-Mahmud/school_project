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

                        <form action="{{ route('admission') }}" method="post" autocomplete="off">
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
                                <label>Class</label>
                                <input type="text" name="class" class="form-control" placeholder="Class" />
                                @if ($errors->has('class'))
                                    <p class="text-danger">{{ $errors->first('class') }}</p>
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
                               <label>Age</label>
                                <input type="text" name="age" class="form-control" placeholder="Age" />
                                @if ($errors->has('age'))
                                    <p class="text-danger">{{ $errors->first('age') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                               <label>Previous_School</label>
                                <input type="text" name="previous_school" class="form-control" placeholder="Previous_School" />
                                @if ($errors->has('previous_school'))
                                    <p class="text-danger">{{ $errors->first('previous_school') }}</p>
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