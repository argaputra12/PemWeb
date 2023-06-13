<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);

        return view('welcome', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8'],
            'profile_photo' => ['nullable'],
        ]);

        // send error message
        if (!$validated) {
            return redirect()->back()->with('error', 'Validation failed!');
        }

        if($request->file('profile_photo')) {
            $fileName = time().'_'.$request->file('profile_photo')->getClientOriginalName();
            $request->file('profile_photo')->move(public_path('profile_photo'), $fileName);
            $filePath = 'profile_photo/'.$fileName;

            $validated['profile_photo'] = $filePath;
        }

        // create user
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'profile_photo' => $validated['profile_photo'],
        ]);

        // send success message
        return redirect()->back()->with('success', 'User created!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'User deleted!');
    }
}