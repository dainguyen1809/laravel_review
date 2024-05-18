@extends('layouts.master')

@section('content')
    <div class="container">
        <form action="{{ route('courses.update', $course) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name course"
                    value="{{ $course->name }}">
                <div class="w-100 mt-2">
                    @if ($errors->has('name'))
                        <span class="text-danger mt-2">
                            {{ $errors->first('name') }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary col-sm-2 mr-3">Update</button>
                    <a href="{{ route('courses.index') }}" class="btn btn-secondary col-sm-3">
                        <i class="uil-arrow-left mx-2"></i>Back to Courses</a>
                </div>
            </div>
        </form>
    </div>
@endsection
