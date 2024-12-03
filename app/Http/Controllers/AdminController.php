<?php
namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Admission;
use Illuminate\Support\Facades\Hash;
use App\Models\Institution;
use App\Models\Faculty;
use App\Models\Course;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Show the admin dashboard
    public function index()
    {
        $courses = Course::all(); // Fetch all courses from the database
        return view('admin.dashboard', compact('courses')); // Pass courses to the view
    }
// In AdminController.php



    public function viewApplications()
{
    // Eager load 'student' and 'course' relationships, including the 'institution' related to the course
    $applications = Application::with(['student', 'course.institution'])->get(); // Eager load student and course with institution
    $institutions = Institution::all(); // Fetch all institutions
    return view('admin.admissions', compact('applications', 'institutions')); // Pass applications and institutions to the view
}


    // Show the form to add a new institution
    public function showAddInstitutionForm()
    {
        return view('admin.add-institution');
    }

   // Delete an institution
   public function deleteInstitution($id)
    {
        $institution = Institution::findOrFail($id);
        $institution->delete();

        return redirect()->route('admin.institutions')->with('success', 'Institution deleted successfully!');
    }

    public function storeInstitution(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:institutions',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Create new institution
    Institution::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password), // Hash the password
    ]);

    return redirect()->route('admin.institutions')->with('success', 'Institution registered successfully!');
}
   // Add a new institution
   public function addInstitution(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:institutions,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Institution::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.institutions')->with('success', 'Institution added successfully!');
    }
    // Show all institutions
    public function showInstitutions()
    {
        $institutions = Institution::all(); // Fetch all institutions
        return view('admin.institutions', compact('institutions')); // Pass the institutions to the view
    }

    // Show the form to add a new faculty
    public function showAddFacultyForm()
    {
        return view('admin.faculties'); // Ensure this view exists
    }

    // Store a new faculty
    public function storeFaculty(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Faculty::create(['name' => $request->name]);

        return redirect()->route('admin.faculties')->with('success', 'Faculty added successfully!');
    }

    // Show all faculties
    public function showFaculties()
    {
        $faculties = Faculty::all();
        return view('admin.faculties', compact('faculties'));
    }


    public function showCourses()
{
    $faculties = Faculty::all(); // Fetch all faculties
    $courses = Course::all(); // Fetch all courses
    $institutions = Institution::all(); // Fetch all institutions

    // Pass faculties, courses, and institutions to the view
    return view('admin.courses', compact('faculties', 'courses', 'institutions'));
}


    // Delete a course
    public function deleteCourse($id)
    {
        $course = Course::findOrFail($id); // Find the course by ID
        $course->delete(); // Delete the course
        return redirect()->route('admin.courses')->with('success', 'Course deleted successfully!');
    }
    // Show the form to add a new course
    public function showAddCourseForm()
    {
        $faculties = Faculty::all();
        return view('admin.add-course', compact('faculties'));
    }

    // Store a new course
    public function storeCourse(Request $request)
    {
 // Validate the request
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

    // Redirect back with a success message
    return redirect()->route('admin.courses')->with('success', 'Course added successfully!');
 }
// Add a new course
public function addCourse(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'faculty_id' => 'required|exists:faculties,id',
        'institution_id' => 'required|exists:institutions,id', // Ensure this line is included
    ]);

    Course::create($request->all());
    return redirect()->route('admin.courses')->with('success', 'Course added successfully!');
}



    // Delete an institution
    public function destroyInstitution($id)
    {
        Institution::findOrFail($id)->delete();
        return redirect()->route('admin.institutions')->with('success', 'Institution deleted successfully!');
    }

    // Delete a course
    public function destroyCourse($id)
    {
        Course::findOrFail($id)->delete();
        return redirect()->route('admin.courses')->with('success', 'Course deleted successfully!');
    }

    public function addFaculty(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    Faculty::create(['name' => $request->name]);
    return redirect()->route('admin.faculties')->with('success', 'Faculty added successfully!');
}

public function deleteFaculty($id)
{
    $faculty = Faculty::findOrFail($id);
    $faculty->delete();

    return redirect()->route('admin.faculties')->with('success', 'Faculty deleted successfully!');
}

  // Show the form to publish admissions
  public function showAdmissionsForm()
    {
        return view('admin.admissions');
    }




    public function showApplications()
{
    $applications = Application::with(['student', 'course'])->get(); // Eager load related models
    return view('admin.admissions', compact('applications'));
}

public function updateApplicationStatus(Request $request, $id)
{
    $request->validate([
        'action' => 'required',
        'institution_id' => 'required|exists:institutions,id', // Ensure institution_id is provided
    ]);

    $application = Application::findOrFail($id); // Find the application

    // Update the application status based on the action
    switch ($request->action) {
        case 'admit':
            $application->status = 'admitted';
            break;
        case 'reject':
            $application->status = 'rejected';
            break;
        case 'pending':
            $application->status = 'pending';
            break;
    }

    // Create a new admission record
    Admission::create([
        'student_id' => $application->student_id,
        'course_id' => $application->course_id,
        'institution_id' => $request->institution_id, // Include institution_id
        'status' => $application->status,
    ]);

    // Save the application status
    $application->save();

    return redirect()->route('admin.admissions')->with('success', 'Application status updated successfully!');
}

// Add this method in your AdminController


public function updateAdmission(Request $request, $id)
{
    $request->validate([
        'action' => 'required|in:admit,reject,pending',
        'institution_id' => 'required|exists:institutions,id', // Ensure institution_id is provided and exists
    ]);

    $admission = Admission::findOrFail($id); // Find the admission record

    // Set the status based on the action
    switch ($request->action) {
        case 'admit':
            $admission->status = 'admitted';
            break;
        case 'reject':
            $admission->status = 'rejected';
            break;
        case 'pending':
            $admission->status = 'pending';
            break;
    }

    // Update the institution_id for the admission
    $admission->institution_id = $request->institution_id; // Ensure you set the institution_id
    $admission->save(); // Save the changes

    return redirect()->route('admin.admissions')->with('success', 'Admission status updated successfully!');
}



    // Handle the form submission to publish admissions
    public function publishAdmissions(Request $request)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        // Logic to update pending applications with the status
        Application::where('status', 'pending')->update(['status' => $request->status]);

        return redirect()->route('admin.dashboard')->with('success', 'Admissions published successfully!');
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
        return redirect('/admin/login')->with('success', 'You have been logged out successfully.');
    }

}
