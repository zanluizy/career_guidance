@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Add Faculty</h2>
    <form method="POST" action="{{ route('admin.faculties.store') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Faculty Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Faculty</button>
    </form>
</div>
@endsection
