@extends('layouts.app')

@section('content')
<div class="container mt-5" style="background-color: #1B2A59; padding: 20px; border-radius: 5px;">
<div class="mb-3">
    <a href="{{ route('student.dashboard') }}" class="btn btn-secondary" style="background-color: #FF5900; border: none; text-decoration:none;padding:5px;border-radius:20px;">Back to Dashboard</a>
    </div>
    <Br>
    <h2 class="text-white">Your Admissions</h2>

    @if($admissions->isEmpty())
        <p class="text-white">You have no admissions yet.</p>
    @else
        <ul class="list-group">
            @foreach ($admissions as $admission)
                <li class="list-group-item" style="background-color: #F24C27; color: white;">
                    Course: {{ $admission->course->name }} - Status: {{ $admission->status }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
