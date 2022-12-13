<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;

class UserController extends Controller
{
    // Show all users
    public function index() {
        return view('users.index', [
            'users' => User::latest()->get()
        ]);
    }

    // Show Create Form
    public function create() {
        return view('users.register');
    }

    
    // Store User detail
    public function store(Request $request, StoreUser $validate) {
        
        $formFields = $validate->all();
        
        if($request->hasFile('profile_picture')) {
            $formFields['profile_picture'] = $request->file('profile_picture')->store('', 'public');
        }
        
        // Hashing
        $formFields['password'] = bcrypt($formFields['password']);
        
        $user = User::create($formFields);
        
        auth()->login($user);
        
        return redirect('/users');
    }
    
    // Show Register Form
    public function login() {
        return view('users.login');
    }

    // Logout
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/users')->with('message', 'Logged Out');
    }

    // Authenticate User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/users')->with('message', 'Login success');
        }

        return back()->withErrors(['email' => "Invalid Credentials"])->onlyInput('email');
    }

    // Show Edit Form
    public function edit(User $user) {
        return view('users.edit', ['user' => $user]);
    }

    // Update Listing Data
    public function update(Request $request, User $user, StoreUser $validate) {

        dd($request);
        $formFields = $validate->all();

        if($request->hasFile('profile_picture')) {
            $formFields['profile_picture'] = $request->file('profile_picture')->store('', 'public');
        }

        $user->update($formFields);

        return redirect('/users');
    }

    // Delete Employee
    public function destroy(Request $request, User $user) {

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $user->delete();
        return redirect('/users');
    }
}
