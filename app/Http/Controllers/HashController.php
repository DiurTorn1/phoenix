<?php
namespace App\Http\Controllers;


class UserController extends Controller
{
    public function store(Request $request)
    {

        // Create a new user
        $user = array('test' => 'test');

        // Return a response
        return response()->json($user, 201);
    }
}