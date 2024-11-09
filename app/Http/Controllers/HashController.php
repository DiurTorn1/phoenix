<?php
namespace App\Http\Controllers;


class UserController extends Controller
{
    public function store(Request $request)
    {
        
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user
        $user = 'password' => bcrypt($validatedData['password']);

        // Return a response
        return response()->json($user, 201);
    }
}