<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class InstitutionAuthController extends Controller
{
    /**
     * Show the institution login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.institution-login');
    }

    /**
     * Handle the institution login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('institution')->attempt($request->only('email', 'password'))) {
            return redirect()->route('institution.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    /**
     * Show the institution registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.institution-register');
    }

    /**
     * Handle the institution registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:institutions'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Create a new institution
        $institution = Institution::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Log the institution in
        Auth::guard('institution')->login($institution);

        return redirect()->route('institution.dashboard');
    }

    /**
     * Handle the institution logout request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('institution')->logout();
        return redirect()->route('institution.login');
    }

    /**
     * Show the institution profile edit form.
     *
     * @return \Illuminate\View\View
     */
    public function editProfile()
    {
        $institution = Auth::user(); // Get the authenticated institution
        return view('auth.institution-profile', compact('institution')); // Pass the institution data to the view
    }

    /**
     * Update the institution profile.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        $institution = Auth::user(); // Get the authenticated institution

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:institutions,email,' . $institution->id,
        ]);

        // Update the institution's profile information
        $institution->name = $request->name;
        $institution->email = $request->email;

        if ($request->filled('password')) {
            $request->validate(['password' => 'confirmed']);
            $institution->password = Hash::make($request->password);
        }

     //   $institution->register(); // Save the changes

        return redirect()->route('institution.profile.edit')->with('success', 'Profile updated successfully!'); // Redirect back with success message
    }
}
