<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Course;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstitutionController extends Controller
{
    public function index()
    {
        return view('institution.dashboard');
    }

    // Show faculties
    public function showFaculties()
    {
        $faculties = Faculty::all();
        return view('institution.faculties', compact('faculties'));
    }

    // Add a new faculty
    public function addFaculty(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Faculty::create(['name' => $request->name]);
        return redirect()->route('institution.faculties')->with('success', 'Faculty added successfully!');
    }

    // Show courses
    public function showCourses()
    {
        $faculties = Faculty::all(); // Fetch the faculties
        $courses = Course::all(); // Fetch the courses
        return view('institution.courses', compact('faculties', 'courses')); // Pass both to the view
    }
    public function viewAdmissions()
{
    // Fetching applications or admissions records
    $applications = Application::with(['student', 'course.institution'])->get(); // Ensure this fetches the necessary data
    return view('institution.admissions', compact('applications'));
}
public function updateAdmissionStatus(Request $request, $id)
{
    $application = Application::findOrFail($id); // Find the application by ID

    // Update the status based on the action received from the form
    if ($request->action === 'admit') {
        $application->status = 'admitted';
    } elseif ($request->action === 'reject') {
        $application->status = 'rejected';
    } elseif ($request->action === 'pending') {
        $application->status = 'pending';
    }

    $application->save(); // Save the updated application status

    return redirect()->route('institution.admissions')->with('success', 'Application status updated successfully!');
}

    // Add a new course
    public function addCourse(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'faculty_id' => 'required|exists:faculties,id', // Ensure that the faculty_id exists in the faculties table
        'institution_id' => 'required|exists:faculties,id', // Ensure that the faculty_id exists in the faculties table
    ]);

    // Create a new course
    Course::create([
        'name' => $request->name,
        'faculty_id' => $request->faculty_id,
        'institution_id'=>$request->institution_id,
    ]);
        return redirect()->route('institution.courses')->with('success', 'Course added successfully!');
    }

    // View applications
    public function viewApplications()
    {
        $applications = Application::with(['student', 'course.institution'])->get(); // Eager load related models
        return view('institution.admissions', compact('applications'));
    }

    // Publish admissions
    public function publishAdmissions(Request $request)
    {
        // Implement your logic to publish admissions here.
    }
// Show the edit faculty form
public function editFaculty($id)
{
    $faculty = Faculty::findOrFail($id); // Fetch the faculty by ID
    return view('institution.edit-faculty', compact('faculty')); // Pass the faculty to the view
}

// Update the faculty
public function updateFaculty(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $faculty = Faculty::findOrFail($id); // Fetch the faculty by ID
    $faculty->name = $request->name; // Update the name
    $faculty->save(); // Save the changes

    return redirect()->route('institution.faculties')->with('success', 'Faculty updated successfully!'); // Redirect back with success message
}


// Delete Faculty
public function deleteFaculty($id)
{
    $faculty = Faculty::findOrFail($id);
    $faculty->delete();

    return redirect()->route('institution.faculties')->with('success', 'Faculty deleted successfully!');
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
        return redirect('/institution/login')->with('success', 'You have been logged out successfully.');
    }
}
