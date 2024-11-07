<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\section;

class AuthController extends Controller
{

    public function register(){
        $sections = Section::all();
        return view('authentication.register', ['sections' => $sections]);
    }

    public function registerSubmit(Request $request){        
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => ['required','string','min:8','confirmed'],
            'section' => ['required','string','max:255'],
        ]);

        // Hash the password before saving
        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
            'section' => $request->section, // Associate the user with the selected section
        ]);

        return redirect(route('authentication.login'))->with('success', 'Section created successfully');

    }

    public function login(){
        return view('authentication.login');
    }


    public function loginAttempt(Request $request){

        $data = $request->validate([
            'email' => ['required','string','email','max:255'],
            'password' => ['required','string','min:8'],           
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->route('section.section')->with('success', 'Login successful');
        } else {
            // If login fails, redirect back with an error message
            return redirect()->back()->withErrors(['Invalid credentials'])->withInput();
        }  
    }


    public function logout(Request $request): RedirectResponse{
        // Logout the user
        Auth::logout();
        
        // Invalidate the session to clear all session data
        $request->session()->invalidate();
        
        // Regenerate the session token to prevent session fixation attacks
        $request->session()->regenerateToken();
        
        // Redirect to the login page with a success message
        return redirect()->route('authentication.login')->with('success', 'Successfully logged out');
    }
}
