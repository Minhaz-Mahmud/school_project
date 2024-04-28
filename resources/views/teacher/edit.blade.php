@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card form-holder">
                <div class="card-body">
                    <h1>Edit</h1>

                    @if (Session::has('error'))
                    <p class="text-danger">{{ Session::get('error') }}</p>
                    @endif

                    <form action="{{ route('teacher.update', ['id' => $teacher]) }}" method="post"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
    <label>Image</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" name="image" id="image" class="custom-file-input" accept="image/*">
            <label class="custom-file-label" for="image">Choose file...</label>
        </div>
    </div>
    @if ($errors->has('image'))
        <p class="text-danger">{{ $errors->first('image') }}</p>
    @endif
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var imageInput = document.getElementById("image");
        var currentImage = "{{ $teacher->image }}";

        // Check if currentImage is not empty and set the file input label
        if (currentImage.trim() !== "") {
            var fileName = currentImage.split('/').pop(); // Extract file name
            var customFileLabel = imageInput.nextElementSibling;
            customFileLabel.textContent = fileName;
        }
    });
</script>


                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$teacher->name}}" />
                            @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Qualification</label>
                            <input type="text" name="qualification" class="form-control" placeholder="Qualification" value="{{$teacher->qualification}}" />
                            @if ($errors->has('qualification'))
                            <p class="text-danger">{{ $errors->first('qualification') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <input type="text" name="gender" class="form-control" placeholder="Gender"  value="{{$teacher->gender}}"/>
                            @if ($errors->has('gender'))
                            <p class="text-danger">{{ $errors->first('gender') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" name="age" class="form-control" placeholder="Age"  value="{{$teacher->age}}"/>
                            @if ($errors->has('age'))
                            <p class="text-danger">{{ $errors->first('age') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="designation" class="form-control" placeholder="Designation"  value="{{$teacher->designation}}"/>
                            @if ($errors->has('designation'))
                            <p class="text-danger">{{ $errors->first('designation') }}</p>
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
