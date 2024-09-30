<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;




class UserController extends Controller
{
    // Show Register/Create Form
    public function create(){
        return view('users.register');
    }

    // Create New User
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:5'],
            'email'=> ['required', 'email', Rule::unique('users','email')],
            'password'=> 'required|confirmed|min:6',   
        ]);

        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    // Logout User
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logged out successfully.');
    }

    // Show Login Form
    public function login() {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email'=> ['required', 'email'],
            'password'=> 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are logged in.');
        }

        return back()->withErrors(['email' => 'Invalid credentials. Please
        try again. '])->onlyInput('email');
    }

    // Show Edit Form for User
    public function edit() {
        $user = Auth::user(); // Get the currently authenticated user
        return view('users.edit', compact('user'));
    }

    public function update(Request $request){
        $user = Auth::user(); // Get the currently authenticated user
    
        // Validation rules
        $validationRules = [
            'name' => ['required', 'min:5'],
            // Only enforce the password rules if a new password is provided
            'password' => ['nullable', 'confirmed', 'min:6'],
        ];
    
        // Validate request data
        $formFields = $request->validate($validationRules);
    
        // Check if a new password is provided
        if(!empty($formFields['password'])){
            // Hash new password
            $formFields['password'] = bcrypt($formFields['password']);
        } else {
            // If no new password is provided, remove it from the array
            unset($formFields['password']);
        }
    
        // Update user details
        $user->update($formFields);
    
        // Redirect to the home page with a success message
        return redirect('/')->with('message', 'Account updated successfully.');
    }    

    public function destroy(Request $request)
    {
        $user = Auth::user(); // Ensure you're working with the authenticated user

        // Perform any pre-deletion logic, like cleaning up related data

        // Delete the user
        $user->delete();

        // Logout the user to clear the session
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token
        $request->session()->regenerateToken();

        // Redirect to the homepage or login page with a success message
        return redirect('/login')->with('message', 'Your account has been successfully deleted.');
    }
}
