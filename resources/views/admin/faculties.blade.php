@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color: #1B2A59; color: white; padding: 20px;">
    <h2 class="mt-3">Add Faculty (Admin)</h2>

    <!-- Back to Dashboard Button -->
    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary" style="background-color: #FF5900; border: none;">Back to Dashboard</a>
    </div>

    <!-- Add Faculty Form -->
    <form action="#" method="POST" style="background-color: #F24C27; padding: 20px; border-radius: 5px;">
        @csrf
        <div class="form-group">
            <label for="facultyName" style="color: white;">Faculty Name</label>
            <input type="text" id="facultyName" name="name" class="form-control" required style="border: 1px solid #FF5900;">
        </div>

        <button type="submit" class="btn btn-primary mt-2" style="background-color: #FF5900; border: none;">Add Faculty</button>
    </form>

    <!-- List of Faculties -->
    <h3 class="mt-4">Faculties</h3>
    <ul class="list-group" style="background-color: #1B2A59; color: white;">
        @foreach($faculties as $faculty)
            <li class="list-group-item" style="background-color: #1B2A59; color: white;">
                {{ $faculty->name }}
                <form action="#" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
