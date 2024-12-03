@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex" style="background-color:#1B2A59; /* Deep Blue */">
    <div class="sidebar" style="width: 15%; background-color: #1B2A59; /* Dark background for sidebar */">
        <h4 class="text-white text-center">Institution Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('institution.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('institution.faculties') }}">Manage Faculties</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('institution.courses') }}">Manage Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('institution.applications') }}">View Applications</a>
            </li>
            <li class="nav-item">
                <!-- <a class="nav-link text-white" href="#">Publish Admissions</a> -->
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('institution.profile.edit') }}">Profile</a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('institution.logout') }}">
                    @csrf
                    <button class="btn btn-danger w-100 mt-3">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <main role="main" class="main-content" style="flex: 1; background-color: #F24C27; /* Gold Orange */; padding: 20px;">
        <div id="contentArea">
            <h2 class="mt-3">Welcome to the Institution Dashboard</h2>
            <p class="text-dark">This is the institution dashboard where you can manage faculties, courses, and view applications.</p>
        </div>
    </main>
</div>



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
