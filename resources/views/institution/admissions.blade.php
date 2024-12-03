@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">{{ __('Available Applications') }}</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover" style="background-color: #1B2A59; color: white;">
        <thead>
            <tr style="background-color: #F24C27; color: white;">
                <th>Student Name</th>
                <th>Course</th>
                <th>Institution</th>
                <th>Status</th>
                <!-- <th>Action</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
                <tr>
                    <td>{{ $application->student->first_name }} {{ $application->student->last_name }}</td>
                    <td>{{ $application->course->name }}</td>
                    <td>
                        @if($application->course && $application->course->institution)
                            {{ $application->course->institution->name }}
                        @else
                            {{ __('No Institution Assigned') }}
                        @endif
                    </td>
                    <td>{{ $application->status }}</td>
                    <!-- <td>
                        <form action="{{ route('admissions.update', $application->id) }}" method="POST">
                            @csrf
                            <button type="submit" name="action" value="admit" class="btn btn-success">
                                <i class="fas fa-check"></i> Admit
                            </button>
                            <button type="submit" name="action" value="reject" class="btn btn-danger">
                                <i class="fas fa-times"></i> Reject
                            </button>
                            <button type="submit" name="action" value="pending" class="btn btn-warning">
                                <i class="fas fa-clock"></i> Leave Pending
                            </button>
                        </form>
                    </td> -->
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        <a href="{{ route('institution.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</div>

<style>
    .table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
        border-radius: 8px; /* Rounded corners */
        overflow: hidden; /* Ensures rounded corners are visible */
    }

    .table th, .table td {
        padding: 15px;
        text-align: left;
    }

    .btn {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px 15px;
        font-size: 16px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn:hover {
        transform: translateY(-2px); /* Slight hover effect */
    }

    .btn-success {
        background-color: #28a745; /* Green */
        border: none;
    }

    .btn-danger {
        background-color: #dc3545; /* Red */
        border: none;
    }

    .btn-warning {
        background-color: #ffc107; /* Yellow */
        border: none;
    }

    .btn-secondary {
        background-color: #6c757d; /* Grey */
        border: none;
    }

    .btn-success:hover {
        background-color: #218838; /* Darker green */
    }

    .btn-danger:hover {
        background-color: #c82333; /* Darker red */
    }

    .btn-warning:hover {
        background-color: #e0a800; /* Darker yellow */
    }

    .btn-secondary:hover {
        background-color: #5a6268; /* Darker grey */
    }
</style>
@endsection
