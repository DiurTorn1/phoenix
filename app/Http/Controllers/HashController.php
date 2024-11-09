<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


class HashController extends Controller
{
    public function index(Request $request)
    {

        // Create a new user
        $user = array('test' => 'test');

        // Return a response
        if (Auth::check()) {
            // User is authenticated
        } else {
            // User is not authenticated
            return response()->json($user, 201);
        }
        
    }
}