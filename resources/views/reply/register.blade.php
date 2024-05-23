@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card form-holder">
                <div class="card-body">
                    <h1>Give Reply</h1>

                    @if (Session::has('error'))
                    <p class="text-danger">{{ Session::get('error') }}</p>
                    @endif

                    <form action="{{ route('add_reply', ['id' => $r_id]) }}" method="post">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label>Topic</label>
                            <input type="text" name="topic" class="form-control" placeholder="Topic" />
                            @if ($errors->has('topic'))
                            <p class="text-danger">{{ $errors->first('topic') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" class="form-control" rows="5" placeholder="Message"></textarea>
                            @if ($errors->has('message'))
                            <p class="text-danger">{{ $errors->first('message') }}</p>
                            @endif
                        </div>

                        <div class="col-12 text-center">
                            <input type="submit" class="btn btn-primary" value="Add Reply" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
