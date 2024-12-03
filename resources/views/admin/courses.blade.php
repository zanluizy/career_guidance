@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color: #1B2A59; color: white; padding: 20px;">
    <h2 class="mt-3">Manage High Learning Institutions</h2>

    <!-- Back to Dashboard Button -->
    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary" style="background-color: #FF5900; border: none;">Back to Dashboard</a>
    </div>

    <!-- Add Institution Form -->
    <form action="{{ route('admin.institutions.store') }}" method="POST" style="background-color: #F24C27; padding: 20px; border-radius: 5px;">
        @csrf
        <div class="form-group">
            <label for="institutionName" style="color: white;">Institution Name</label>
            <input type="text" id="institutionName" name="name" class="form-control" required style="border: 1px solid #FF5900;">
        </div>

        <div class="form-group">
            <label for="email" style="color: white;">Institution Email</label>
            <input type="email" id="email" name="email" class="form-control" required style="border: 1px solid #FF5900;">
        </div>

        <div class="form-group">
            <label for="password" style="color: white;">Password</label>
            <input type="password" id="password" name="password" class="form-control" required style="border: 1px solid #FF5900;">
        </div>

        <div class="form-group">
            <label for="password_confirmation" style="color: white;">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required style="border: 1px solid #FF5900;">
        </div>

        <button type="submit" class="btn btn-primary mt-2" style="background-color: #FF5900; border: none;">Add Institution</button>
    </form>

    <!-- List of Institutions -->
    <h3 class="mt-4">Registered Institutions</h3>
    <ul class="list-group" style="background-color: #1B2A59; color: white;">
        @foreach($institutions as $institution)
            <li class="list-group-item" style="background-color: #1B2A59; color: white;">
                {{ $institution->name }} - {{ $institution->email }}
                <form action="{{ route('admin.institutions.delete', $institution->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>

                <!-- Display associated courses -->
                @if($institution->courses->count() > 0)
                    <ul>
                        @foreach($institution->courses as $course)
                            <li>{{ $course->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <span>No Courses Assigned</span>
                @endif
            </li>
        @endforeach
    </ul>
</div>
@endsection
