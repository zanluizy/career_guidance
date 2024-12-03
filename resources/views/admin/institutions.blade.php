@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color: #1B2A59; color: white; padding: 20px;">
    <h2 class="mt-3">Add High Learning Institution</h2>

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
    <ul class="list-group" style="background-color: #1B2A59; border-radius: 10px; padding: 10px;">
    @foreach($institutions as $institution)
        <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #333; color: white; margin-bottom: 10px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
            <span>
                <strong>{{ $institution->name }}</strong> - {{ $institution->email }}
            </span>
            <form action="{{ route('admin.institutions.delete', $institution->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" style="border: none; padding: 5px 10px;">
                    <i class="fas fa-trash-alt"></i> Delete
                </button>
            </form>
        </li>
    @endforeach
</ul>
</div>

<style>
    .form-group {
        margin-bottom: 15px; /* Space between form elements */
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 15px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn:hover {
        transform: translateY(-2px); /* Slight hover effect */
    }

    .btn-secondary {
        background-color: #6c757d; /* Grey */
        border: none;
    }

    .btn-secondary:hover {
        background-color: #5a6268; /* Darker grey */
    }

     /* List item container styling */
     .list-group-item {
        padding: 15px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    /* Add a slight lift on hover */
    .list-group-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    /* Delete button styling */
    .btn-danger {
        background-color: #FF5900;
        border: none;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-danger:hover {
        background-color: #e65700;
        transform: scale(1.05); /* Slightly enlarge on hover */
    }

    /* Align items center and justify space */
    .d-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Style the icon within the delete button */
    .fas.fa-trash-alt {
        margin-right: 5px;
    }
</style>
@endsection
