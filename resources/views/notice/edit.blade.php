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

                    <form action="{{ route('add_notice') }}" method="post">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label>Header</label>
                            <input type="text" name="head" class="form-control" placeholder="Head" value="{{$notice->head}}" />
                            @if ($errors->has('head'))
                            <p class="text-danger">{{ $errors->first('head') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="des" class="form-control" rows="5" placeholder="Description"  value="{{$notice->des}}"></textarea>
                            @if ($errors->has('des'))
                            <p class="text-danger">{{ $errors->first('des') }}</p>
                            @endif
                        </div>

                        <div class="col-12 text-center">
                            <input type="submit" class="btn btn-primary" value="Register" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
