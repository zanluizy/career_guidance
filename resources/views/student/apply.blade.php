@extends('layouts.app')

@section('content')
<div class="container mt-5" style="background-color: #1B2A59; padding: 20px; border-radius: 5px;">
<div class="mb-3">
    <a href="{{ route('student.dashboard') }}" class="btn btn-secondary" style="background-color: #FF5900; border: none; text-decoration:none;padding:5px;border-radius:20px;">Back to Dashboard</a>
    </div>
    <Br>
    <h2 class="text-white">Apply for Courses</h2>
    <form action="{{ route('student.apply.store') }}" method="POST" style="background-color: #F24C27; padding: 20px; border-radius: 5px;">
        @csrf
        <div class="mb-3">
            <label for="course_id" class="form-label text-white">Select Course</label>
            <select id="course_id" name="course_id" class="form-control" required>
                @foreach($courses as $course) <!-- Use the $courses variable -->
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #FF5900; border: none;">Submit Application</button>
    </form>
</div>
@endsection
