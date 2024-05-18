@extends('layouts.master')

@section('content')
    <div class="mb-3 d-flex align-items-center justify-content-between">
        <a class="btn btn-primary" href="{{ route('courses.create') }}">
            Add new course
        </a>

        <caption class="justify-content-end">
            <form action="#" class="form-group form-inline">
                <label class="mx-3" for="q">Search:</label>
                <input class="form-control" type="text" name="q" value="{{ $search }}" placeholder="Search...">
            </form>
        </caption>

    </div>
    <table class="table table-dark mb-2">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        @foreach ($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->format_date }}</td>
                <td class="d-flex">
                    <a class="btn btn-info mx-2" href="{{ route('courses.edit', $course) }}">Edit</a>
                    <form action="{{ route('courses.destroy', $course) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <nav>
        <ul class="pagination pagination-rounded mb-0">
            {{ $courses->links() }}
        </ul>
    </nav>
@endsection
