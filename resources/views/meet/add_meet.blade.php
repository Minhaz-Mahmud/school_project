@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card form-holder">
                <div class="card-body">
                    <h1>Add Marks</h1>

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
                            <input type="submit" class="btn btn-primary" value="Add Marks" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
