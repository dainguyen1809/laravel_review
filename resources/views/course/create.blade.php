<form action="{{ route('courses.store') }}" method="post">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" placeholder="enter name course" value="{{ old('name') }}">
    @if ($errors->has('name'))
        <span>
            {{ $errors->first('name') }}
        </span>
    @endif

    <br><br>
    <button>Add new course</button>
</form>
