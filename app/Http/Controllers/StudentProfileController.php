<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class StudentProfileController extends Controller
{
    // Show the edit profile form
    public function edit()
    {
        // Get the currently authenticated student
        $student = Auth::guard('student')->user();

        // Return the view with student data
        return view('student.profile.edit', compact('student'));
    }

    // Handle the profile update
    public function update(Request $request)
    {
        // Get the currently authenticated student
        $student = Auth::guard('student')->user();

        // Validate the request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . $student->id,
        ]);

        // Update the student information
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->email = $request->input('email');

        // Save the updated student record to the database

        // Redirect back to the edit profile page with a success message
        return redirect()->route('student.profile.edit')->with('success', 'Profile updated successfully!');
    }
}
