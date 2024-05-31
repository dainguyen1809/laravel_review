@extends('layouts.master')
{{-- @push('style')
    <link href="https://cdn.datatables.net/v/dt/dt-2.0.7/datatables.min.css" rel="stylesheet">
@endpush --}}

@section('content')
    <div class="mb-3 d-flex align-items-center justify-content-between">
        <a class="btn btn-primary" href="{{ route('students.create') }}">
            Add New Student
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
    {{-- <table class="">
        
       
         
    </table> --}}

    <table class="table table-dark mb-2">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Status</th>
                <th>Course</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td class="table-user">
                        {{-- <img src="{{ session()->get('avatar') }}" alt="user-image" class="rounded-circle" /> --}}
                        <img src="{{ asset($student->avatar) }}" alt="table-user" class="mr-2 rounded-circle" />
                        {{ $student->name }}
                    </td>
                    <td>{{ $student->format_gender }}</td>
                    <td>{{ $student->format_age }}</td>
                    <td @if ($student->format_status === 'Stop') class="text-danger font-weight-bold" @endif>
                        {{ $student->format_status }}
                    </td>
                    <td>{{ $student->course_name }}</td>
                    <td>{{ $student->format_date }}</td>
                    <td class="table-action d-flex">
                        <a class="btn btn-info mr-2" href="{{ route('students.edit', $student) }}">
                            <i class="mdi mdi-pencil"></i>
                        </a>
                        <form action="{{ route('students.destroy', $student) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">
                                <i class="mdi mdi-delete"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <nav>
        <ul class="pagination pagination-rounded mb-0">
            {{ $students->links() }}
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
