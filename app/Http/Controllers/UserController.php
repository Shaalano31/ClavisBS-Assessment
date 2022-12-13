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
        return view('users.create');
    }

    // Store User detail
    public function store(Request $request, StoreUser $validate) {

        $formFields = $validate->all();

        if($request->hasFile('profile_picture')) {
            $formFields['profile_picture'] = $request->file('profile_picture')->store('', 'public');
        }

        User::create($formFields);

        return redirect('/users');
    }

    // Show Edit Form
    public function edit(User $user) {
        return view('users.edit', ['user' => $user]);
    }

    // Update Listing Data
    public function update(Request $request, User $user, StoreUser $validate) {

        $formFields = $validate->all();

        if($request->hasFile('profile_picture')) {
            $formFields['profile_picture'] = $request->file('profile_picture')->store('', 'public');
        }

        $user->update($formFields);

        return redirect('/users');
    }

    // Delete Employee
    public function destroy(User $user) {

        $user->delete();
        return redirect('/users');
    }
}
