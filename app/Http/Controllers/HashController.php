<?php
namespace App\Http\Controllers;


class HashController extends Controller
{
    public function index(Request $request)
    {

        // Create a new user
        $user = array('test' => 'test');

        // Return a response
        return response()->json($user, 201);
    }
}