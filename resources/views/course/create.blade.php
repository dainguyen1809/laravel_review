@extends('layouts.master')

@section('content')
    <div class="container">
        <form action="{{ route('courses.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name course"
                    value="{{ old('name') }}">
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary col-sm-2 mr-3">Submit</button>
                    <a href="{{ route('courses.index') }}" class="btn btn-secondary col-sm-3">
                        <i class="uil-arrow-left mx-2"></i>Back to Courses</a>
                </div>
            </div>
        </form>
    </div>
@endsection
