<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\InstitutionAuthController;
use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// Welcome Route
Route::get('/', function () {
    return view('welcome');
});
Route::get('/faculties', [InstitutionController::class, 'showFaculties'])->name('faculties');
// Admin Routes

// Route to show the admissions form (GET request)
Route::get('admin/admissions', [AdminController::class, 'showAdmissionsForm'])->name('admin.admissions');

// Route to publish admissions (POST request)
Route::post('admin/admissions/publish', [AdminController::class, 'publishAdmissions'])->name('admin.admissions.publish');
// Show applications
Route::get('admin/admissions', [AdminController::class, 'showApplications'])->name('admin.admissions');

// Update application status
Route::post('admin/admissions/{id}/update', [AdminController::class, 'updateApplicationStatus'])->name('admin.admissions.update');
Route::get('/admin/admissions', [AdminController::class, 'viewApplications'])->name('admin.admissions');

Route::prefix('admin')->name('admin.')->group(function () {
// Route to display the admissions form
    Route::get('admin/admissions', [AdminController::class, 'showAdmissionsForm'])->name('admin.admissions');

// Route to handle the publishing of admissions
    Route::post('admin/admissions/publish', [AdminController::class, 'publishAdmissions'])->name('admin.admissions.publish');

    Route::get('admin/admissions', [AdminController::class, 'showAdmissionsForm'])->name('admin.admissions');

    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::get('/register', [AdminAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AdminAuthController::class, 'register']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::post('admin/admissions/publish', [AdminController::class, 'publishAdmissions'])->name('admin.admissions.publish');
    Route::get('/courses', [AdminController::class, 'showCourses'])->name('courses');
// Faculties
    Route::get('admin/faculties', [AdminController::class, 'showFaculties'])->name('admin.faculties');
    Route::post('admin/faculties', [AdminController::class, 'addFaculty'])->name('admin.faculties.store');
    Route::delete('admin/faculties/{id}', [AdminController::class, 'deleteFaculty'])->name('admin.faculties.delete');
// Admin routes for managing institutions
    Route::get('admin/institutions', [AdminController::class, 'showInstitutions'])->name('admin.institutions');
    Route::post('admin/institutions', [AdminController::class, 'storeInstitution'])->name('admin.institutions.store');
    Route::delete('admin/institutions/{id}', [AdminController::class, 'deleteInstitution'])->name('admin.institutions.delete');

// Route to show the add course form
    Route::get('/courses/add', [AdminController::class, 'addCourse'])->name('courses.add');
    Route::post('/admin/institutions', [AdminController::class, 'addInstitution'])->name('admin.institutions.store');

// Route to store a new course
    Route::post('/courses', [AdminController::class, 'storeCourse'])->name('courses.store');

    Route::post('/courses', [AdminController::class, 'storeCourse'])->name('courses.store');
    // Admin Dashboard Routes
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/faculties/add', [AdminController::class, 'showAddFacultyForm'])->name('faculties.add');
        Route::post('/faculties', [AdminController::class, 'storeFaculty'])->name('faculties.store');

        // Manage Institutions
        Route::get('/institutions', [AdminController::class, 'showInstitutions'])->name('institutions');
        Route::post('/institutions', [AdminController::class, 'addInstitution'])->name('institutions.add');
        Route::delete('/institutions/{id}', [AdminController::class, 'deleteInstitution'])->name('institutions.delete');

        // Manage Faculties
        Route::get('/faculties', [AdminController::class, 'showFaculties'])->name('faculties');
        Route::post('/faculties', [AdminController::class, 'addFaculty'])->name('faculties.add');

        // Manage Courses
        Route::get('/courses', [AdminController::class, 'showCourses'])->name('courses');
        Route::post('/courses', [AdminController::class, 'addCourse'])->name('courses.add');
        Route::delete('/courses/{id}', [AdminController::class, 'deleteCourse'])->name('courses.delete');

        // Publish Admissions
        Route::post('/admissions', [AdminController::class, 'publishAdmissions'])->name('admissions.publish');
        Route::delete('/courses/{id}', [AdminController::class, 'deleteCourse'])->name('courses.delete');
        Route::post('/institutions', [AdminController::class, 'addInstitution'])->name('institutions.store');
        // Profile Management
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    });
});

// Institution Profile Management Routes
Route::middleware(['auth:institution'])->group(function () {
    Route::get('/institution/profile', [InstitutionAuthController::class, 'edit'])->name('institution.profile.edit');
    Route::patch('/institution/profile', [InstitutionAuthController::class, 'update'])->name('institution.profile.update');
});

Route::post('/admissions/update/{id}', [InstitutionController::class, 'updateAdmission'])->name('admissions.update');

Route::get('/admissions', [InstitutionController::class, 'viewAdmissions'])->name('admissions'); // This should be a GET route
Route::post('/admissions', [InstitutionController::class, 'updateAdmissionStatus'])->name('admissions.update'); // This should be a POST route
// Institution Authentication Routes
Route::prefix('institution')->name('institution.')->group(function () {
    Route::get('/login', [InstitutionAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [InstitutionAuthController::class, 'login']);
    Route::get('/register', [InstitutionAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [InstitutionAuthController::class, 'register']);
    Route::post('/logout', [InstitutionAuthController::class, 'logout'])->name('logout');
// Manage Faculties Routes
    Route::get('/faculties', [InstitutionController::class, 'showFaculties'])->name('faculties');
    Route::post('/faculties', [InstitutionController::class, 'addFaculty'])->name('faculties.add');
    Route::get('/faculties/edit/{id}', [InstitutionController::class, 'editFaculty'])->name('faculties.edit'); // Edit route
    Route::patch('/faculties/update/{id}', [InstitutionController::class, 'updateFaculty'])->name('faculties.update'); // Update route
    Route::delete('/faculties/{id}', [InstitutionController::class, 'deleteFaculty'])->name('faculties.delete'); // Delete route

    Route::get('/faculties/edit/{id}', [InstitutionController::class, 'editFaculty'])->name('faculties.edit');
    Route::put('/faculties/update/{id}', [InstitutionController::class, 'updateFaculty'])->name('faculties.update');

    // Institution Dashboard Routes
    Route::middleware(['auth:institution'])->group(function () {
        Route::get('/dashboard', [InstitutionController::class, 'index'])->name('dashboard');

        // Manage Courses
        Route::get('/institution/courses', [InstitutionController::class, 'showCourses'])->name('courses'); // Show courses
        Route::post('/institution/courses', [InstitutionController::class, 'addCourse'])->name('courses.add'); // Add a new course

// Application Routes
        Route::get('/applications', [InstitutionController::class, 'viewApplications'])->name('institution.applications');

        // Manage Faculties
        Route::get('/faculties', [InstitutionController::class, 'showFaculties'])->name('faculties'); // Show faculties
        Route::post('/faculties', [InstitutionController::class, 'addFaculty'])->name('faculties.add'); // Add a new faculty

        // Manage Courses
        Route::get('/courses', [InstitutionController::class, 'showCourses'])->name('courses'); // Show courses
        Route::post('/courses', [InstitutionController::class, 'addCourse'])->name('courses.add'); // Add a new course

        // View Applications
        Route::get('/applications', [InstitutionController::class, 'viewApplications'])->name('applications');

        // Publish Admissions
        Route::post('/admissions', [InstitutionController::class, 'publishAdmissions'])->name('admissions.publish');

        // Profile Management
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    });
});

// Student Authentication Routes
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/login', [StudentAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [StudentAuthController::class, 'login']);
    Route::get('/register', [StudentAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [StudentAuthController::class, 'register']);
    Route::post('/logout', [StudentAuthController::class, 'logout'])->name('logout');

    // Student Dashboard Routes
    Route::middleware('auth:student')->group(function () {
        Route::get('/dashboard', [StudentController::class, 'index'])->name('dashboard');
        Route::get('/apply', [StudentController::class, 'showApplicationForm'])->name('apply'); // Show application form
        Route::post('/apply', [StudentController::class, 'storeApplication'])->name('apply.store'); // Store application
        Route::get('/admissions', [StudentController::class, 'viewAdmissions'])->name('admissions'); // View admissions
        Route::get('/profile', [StudentController::class, 'editProfile'])->name('profile.edit'); // Edit profile
        Route::patch('/profile', [StudentController::class, 'updateProfile'])->name('profile.update'); // Update profile
        Route::get('/student/admissions', [StudentController::class, 'viewAdmissions'])->name('student.admissions');

        // Student Profile Routes
        Route::prefix('student')->middleware('auth:student')->group(function () {
            Route::get('/profile', [StudentProfileController::class, 'edit'])->name('student.profile.edit');
            Route::patch('/profile', [StudentProfileController::class, 'update'])->name('student.profile.update');
        });
        Route::post('/student/logout', [StudentController::class, 'logout'])->name('student.logout');

    });
});
