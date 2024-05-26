@extends('layouts.master')

@section('content')
    <div class="container">
        <form action="{{ route('students.store', $student) }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name course"
                    value="{{ $student->name }}">
            </div>

            <div class="mb-2">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio3" name="gender" class="custom-control-input" value="1"
                        checked>
                    <label class="custom-control-label" for="customRadio3">Male</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio4" name="gender" class="custom-control-input" value="0">
                    <label class="custom-control-label" for="customRadio4">Female</label>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Birthdate</label>
                <input class="form-control" id="example-date" type="date" name="birthdate"
                    value="{{ $student->birthdate }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="custom-select">
                    @foreach ($status as $option => $value)
                        <option value="{{ $value }}">
                            {{ $option }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Course</label>
                <select name="course_id" class="custom-select">
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">
                            {{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary col-sm-2 mr-3">Submit</button>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary col-sm-3">
                        <i class="uil-arrow-left mx-2"></i>Back to Courses</a>
                </div>
            </div>
        </form>
    </div>
@endsection
