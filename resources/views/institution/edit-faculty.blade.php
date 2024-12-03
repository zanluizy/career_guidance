@extends('layouts.app')

@section('content')
<div class="container mt-5" style="background-color: #1B2A59; color: white; padding: 20px; border-radius: 5px;">
<div class="mb-3">
    <a href="{{ route('institution.dashboard') }}" class="btn btn-secondary" style="background-color: #FF5900; border: none; text-decoration:none;padding:5px;border-radius:20px;">Back to Dashboard</a>
    </div>
    <Br>
    <h2>Edit Faculty</h2>

    <form action="{{ route('institution.faculties.update', $faculty->id) }}" method="POST" style="background-color: #F24C27; padding: 20px; border-radius: 5px;">
        @csrf
        @method('PUT') <!-- Use PUT method for updating -->

        <div class="mb-3">
            <label for="name" class="form-label" style="color: white;">Faculty Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $faculty->name }}" required style="border: 1px solid #FF5900;">
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #FF5900; border: none;">Update Faculty</button>
    </form>
</div>
@endsection
