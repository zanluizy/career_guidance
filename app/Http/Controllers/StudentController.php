<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use App\Models\Course;
class StudentController extends Controller
{
    public function index()
    {
        return view('student.dashboard');
    }


    public function showApplicationForm()
{
    $courses = Course::all(); // Fetch all courses
    return view('student.apply', compact('courses')); // Pass the $courses variable to the view
}

    public function storeApplication(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id', // Assuming course_id is coming from the form
            // Add any other validation rules as necessary
        ]);

        $application = new Application();
        $application->student_id = Auth::id();
        $application->course_id = $request->course_id;
        $application->status = 'pending'; // Default status
        $application->save();

        return redirect()->route('student.admissions')->with('success', 'Application submitted successfully!');
    }

    public function viewAdmissions()
    {
        $admissions = Application::where('student_id', Auth::id())->get();

return view('student.admissions', compact('admissions'));
    }

    public function editProfile()
    {
        $student = Auth::user();
        return view('student.profile', compact('student'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . Auth::id(),
            // Add other fields as necessary
        ]);

        $student = Auth::user();
        $student->name = $request->name;
        $student->email = $request->email;
       // $student->save();

        return redirect()->route('student.profile.edit')->with('success', 'Profile updated successfully!');
    }

    public function logout(Request $request)
    {
        // Log the user out of the web guard
        Auth::guard('web')->logout();

        // Invalidate the current session
        $request->session()->invalidate();

        // Regenerate the session token to prevent session fixation attacks
        $request->session()->regenerateToken();

        // Redirect to the student login page or another desired page
        return redirect('/student/login')->with('success', 'You have been logged out successfully.');
    }
}
