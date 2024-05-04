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

                    <form action="{{ route('marks.update',['id'=>$marks->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" name="id" class="form-control" placeholder="ID"  value="{{$marks->id}}"/>
                            @if ($errors->has('id'))
                            <p class="text-danger">{{ $errors->first('id') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Exam</label>
                            <input type="text" name="exam" class="form-control" placeholder="Exam" value="{{$marks->exam}}" />
                            @if ($errors->has('exam'))
                            <p class="text-danger">{{ $errors->first('exam') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Bangla</label>
                            <input type="text" name="bangla" class="form-control" placeholder="Bangla"  value="{{$marks->bangla}}" />
                            @if ($errors->has('bangla'))
                            <p class="text-danger">{{ $errors->first('bangla') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>English</label>
                            <input type="text" name="english" class="form-control" placeholder="English"  value="{{$marks->english}}"/>
                            @if ($errors->has('english'))
                            <p class="text-danger">{{ $errors->first('english') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Math</label>
                            <input type="text" name="math" class="form-control" placeholder="Math"  value="{{$marks->math}}"/>
                            @if ($errors->has('math'))
                            <p class="text-danger">{{ $errors->first('math') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Science</label>
                            <input type="text" name="science" class="form-control" placeholder="Science"  value="{{$marks->science}}" />
                            @if ($errors->has('science'))
                            <p class="text-danger">{{ $errors->first('science') }}</p>
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
