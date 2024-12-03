@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex" style="background-color:#1B2A59; /* Deep Blue */">
    <div class="sidebar" style="width: 15%; background-color: #1B2A59; /* Dark background for sidebar */">
        <h4 class="text-white text-center">Admin Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.institutions') }}">Add Institutions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.faculties.add') }}">Add Faculties</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.courses.add') }}">Add Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.institutions') }}">Delete Institutions</a>
            </li>
            <li class="nav-item">
    <a class="nav-link text-white" href="{{ route('admin.admissions') }}">Publish Admissions</a>
</li>


            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.profile.edit') }}">Profile</a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="btn btn-danger w-100 mt-3">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <main role="main" class="main-content" style="flex: 1; background-color: #F24C27; /* Gold Orange */; padding: 20px;">
        <div id="contentArea">
            <h2 class="mt-3">Welcome to the Admin Dashboard</h2>
            <p class="text-dark">This is the admin dashboard where you can manage institutions, faculties, courses, and admissions.</p>
        </div>
    </main>
</div>

<script>
    function showSection(section) {
        let contentArea = document.getElementById('contentArea');
        switch(section) {
            case 'dashboard':
                contentArea.innerHTML = '<h2 class="mt-3">Admin Dashboard</h2><p>This is the admin dashboard where you can manage institutions and courses.</p>';
                break;
            // Additional cases for each menu item can be added here
            default:
                contentArea.innerHTML = '<h2 class="mt-3">Welcome to the Admin Dashboard</h2><p>This is the admin dashboard where you can manage institutions and courses.</p>';
        }
    }
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
