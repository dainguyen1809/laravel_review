@extends('layouts.master')
{{-- @push('style')
    <link href="https://cdn.datatables.net/v/dt/dt-2.0.7/datatables.min.css" rel="stylesheet">
@endpush --}}

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="mb-3 d-flex align-items-center justify-content-between">
        <a class="btn btn-primary" href="{{ route('courses.create') }}">
            Add new course
        </a>
        <div class="app-search dropdown d-none d-lg-block">
            <form>
                <div class="input-group">
                    <input type="text" name="q" class="form-control dropdown-toggle" placeholder="Search..."
                        id="top-search" />
                    <span class="mdi mdi-magnify search-icon"></span>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-dark mb-2 text-center">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Number Students</th>
            <th>Created At</th>
            @if (checkAdmin())
                <th>Action</th>
            @endif
        </tr>
        @foreach ($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->students_count }}</td>
                <td>{{ $course->format_date }}</td>
                @if (checkAdmin())
                    <td class="d-flex justify-content-center">
                        <a class="btn btn-info mx-2" href="{{ route('courses.edit', $course) }}">Edit</a>
                        <form action="{{ route('courses.destroy', $course) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                @endif
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
