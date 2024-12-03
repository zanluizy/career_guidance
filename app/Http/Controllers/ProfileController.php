<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the authenticated user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $institution = Auth::user(); // Get the authenticated institution
        return view('institution.profile', compact('institution'));
    }

    /**
     * Update the authenticated user's profile.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:institutions,email,' . Auth::id(),
            // Add more fields if needed
        ]);

        $institution = Auth::user();
        $institution->name = $request->name;
        $institution->email = $request->email;
        // Update more fields if needed


        return redirect()->route('institution.profile.edit')->with('success', 'Profile updated successfully!');
    }
}
