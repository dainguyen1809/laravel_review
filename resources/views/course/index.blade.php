@extends('layouts.master')
{{-- @push('style')
    <link href="https://cdn.datatables.net/v/dt/dt-2.0.7/datatables.min.css" rel="stylesheet">
@endpush --}}

@section('content')
    <div class="mb-3 d-flex align-items-center justify-content-between">
        <a class="btn btn-primary" href="{{ route('courses.create') }}">
            Add new course
        </a>
        <form action="" class="form-inline">
            <div class="form-group">
                <label class="mx-3" for="q">Search</label>
                <input type="text" placeholder="search..." name="q" class="form-control">
            </div>
        </form>
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


{{-- 
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-2.0.7/b-3.0.2/b-html5-3.0.2/b-print-3.0.2/date-1.5.2/r-3.0.2/sc-2.4.2/sb-1.7.1/datatables.min.js">
    </script>
@endpush --}}
