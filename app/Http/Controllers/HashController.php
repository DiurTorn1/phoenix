<?php
namespace App\Http\Controllers;

Route::middleware('auth')->group(function () {
    Route::get('/hash', [HashController::class, 'index']);
});
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