<form action="{{ route('courses.update', $course) }}" method="post">
    @csrf
    @method('put')
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ $course->name }}">
    @if ($errors->has('name'))
        <span>
            {{ $errors->first('name') }}
        </span>
    @endif
    <br><br>
    <button>Update</button>
</form>
