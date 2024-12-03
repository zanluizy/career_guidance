@extends('layouts.app')

@section('content')
<div>
<div class="container mt-5" style="background-color: #1B2A59; color: white; padding: 20px; border-radius: 5px;">


<div class="mb-3">
    <a href="{{ route('institution.dashboard') }}" class="btn btn-secondary" style="background-color: #FF5900; border: none; text-decoration:none;padding:5px;border-radius:20px;">Back to Dashboard</a>
    </div>
    <br>
    <h2>Manage Faculties</h2>
    <form action="{{ route('institution.faculties.add') }}" method="POST" style="background-color: #F24C27; padding: 20px; border-radius: 5px;">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label" style="color: white;">Faculty Name</label>
            <input type="text" class="form-control" id="name" name="name" required style="border: 1px solid #FF5900; height:30px; width:330px;">
        </div>
        <br><br>
        <button type="submit" class="btn btn-primary" style="background-color: #FF5900; color:white;font-weight:bold;border: none;padding:10px;border-radius:10px;">Add Faculty</button>
    </form>
<center>
    <h3 class="mt-5">Existing Faculties</h3>
    <div class="table-responsive">
    <table class="table table-bordered table-hover" style="background-color: #1B2A59; color: white; border-collapse: separate; border-spacing: 0;">
    <thead style="background-color: #F24C27; color: white;">
        <tr>
            <th scope="col" style="padding: 12px;">#</th>
            <th scope="col" style="padding: 12px;">Faculty Name</th>
            <th scope="col" style="padding: 12px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($faculties as $faculty)
            <tr style="border-bottom: 1px solid #FF5900;">
                <th scope="row" style="padding: 12px;">{{ $loop->iteration }}</th>
                <td style="padding: 12px;">{{ $faculty->name }}</td>
                <td style="padding: 12px;">
                    <a href="{{ route('institution.faculties.edit', $faculty->id) }}" class="btn btn-warning btn-sm" style="background-color: #FFA500; border: none; padding: 5px 10px; border-radius: 5px;">Update</a>
                    <form action="{{ route('institution.faculties.delete', $faculty->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this faculty?')" style="background-color: #dc3545; border: none; padding: 5px 10px; border-radius: 5px;">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</center>
<style>
    .table {
        border-radius: 8px; /* Rounded corners for the table */
        overflow: hidden;
        margin-top: 20px;
    }

    .table th, .table td {
        text-align: left;
        vertical-align: middle;
    }

    .btn-warning:hover {
        background-color: #e69500; /* Darker shade on hover */
    }

    .btn-danger:hover {
        background-color: #c82333; /* Darker red on hover */
    }

    .table-hover tbody tr:hover {
        background-color: #333f66; /* Darker shade on row hover */
    }

    form {
        margin-top: 20px;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Customize the input field */
    .form-control {
        box-shadow: none; /* Remove default shadow */
        transition: border-color 0.3s, background-color 0.3s;
    }

    .form-control:focus {
        border-color: #FF8C00; /* Change border on focus */
        background-color: #444; /* Slightly lighter background */
        outline: none;
    }

    /* Style the submit button */
    .btn-primary {
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15); /* Add a subtle shadow */
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-primary:hover {
        background-color: #e67e00; /* Darken the button on hover */
        transform: translateY(-2px); /* Add a slight "lift" effect */
    }

    /* Label styling */
    .form-label {
        font-size: 14px;
        letter-spacing: 1px;
    }
</style>

    </div


</div>
@endsection
