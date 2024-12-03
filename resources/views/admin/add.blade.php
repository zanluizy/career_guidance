@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">{{ __('Add New Course') }}</h2>
    <div class="card shadow-sm p-4" style="max-width: 500px; margin: 0 auto;">
        <form method="POST" action="{{ route('admin.courses.store') }}">
            @csrf
            <!-- Course Name -->
            <div class="form-group mb-3">
                <label for="name">{{ __('Course Name') }}</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <!-- Select Faculty -->
            <div class="form-group mb-3">
                <label for="faculty_id">{{ __('Select Faculty') }}</label>
                <select id="faculty_id" name="faculty_id" class="form-control" required>
                    @foreach($faculties as $faculty)
                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">{{ __('Add Course') }}</button>
        </form>
    </div>
</div>
@endsection
