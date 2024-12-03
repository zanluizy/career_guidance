@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex" style="background-color:#1B2A59; /* Deep Blue */">
    <div class="sidebar" style="width: 15%; background-color: #1B2A59; /* Dark background for sidebar */">
        <h4 class="text-white text-center">Student Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('student.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('student.apply') }}">Apply for Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('student.admissions') }}">View Admissions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('student.profile.edit') }}">Update Profile</a>
            </li>
            <form method="POST" action="{{ route('student.logout') }}">
                    @csrf
                    <button class="btn btn-danger w-100 mt-3">Logout</button>
                </form>
        </ul>
    </div>

    <!-- Main Content -->
    <main role="main" class="main-content" style="flex: 1; background-color: #F24C27; /* Gold Orange */; padding: 20px; margin-left:15%;">
        <div id="contentArea">
            <h2 class="mt-3">Welcome to the Student Dashboard</h2>
            <p class="text-dark">This is the student dashboard where you can apply for courses and view admissions.</p>
        </div>
    </main>
</div>

<script>
    // This script is not needed anymore since we're using route navigation instead of showSection.
</script>

<style>
    body {
        background-color: black; /* Background color */
        color: white; /* Default text color */
    }
    .sidebar {
        height: 100vh; /* Full height sidebar */
        position: fixed; /* Fix sidebar on the left */
    }
    .nav-link:hover {
        background-color: orange; /* Highlight color on hover */
    }

    a {
        text-decoration: none;
        color: azure;
        font-weight: bold;
    }
    li {
        list-style-type: none;
        margin-top: 5px;
    }
</style>
@endsection
