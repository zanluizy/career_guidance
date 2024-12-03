@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Add Course</h2>
    <form method="POST" action="{{ route('admin.courses.store') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Course Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="faculty_id">Select Faculty</label>
            <select name="faculty_id" class="form-control" required>
                @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Course</button>
    </form>
</div>
@endsection
