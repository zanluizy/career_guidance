@extends('layouts.app')

@section('content')
<div class="container mt-5" style="background-color: #1B2A59; color: white; padding: 20px; border-radius: 5px;">
<div class="mb-3">
    <a href="{{ route('institution.dashboard') }}" class="btn btn-secondary" style="background-color: #FF5900; border: none; text-decoration:none;padding:5px;border-radius:20px;">Back to Dashboard</a>
    </div>
    <Br>
    <h2>View Applications</h2>
    @if ($applications->isEmpty())
        <p>No applications found.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Course Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $application->student->name }}</td>
                        <td>{{ $application->course->name }}</td>
                        <td>{{ ucfirst($application->status) }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
