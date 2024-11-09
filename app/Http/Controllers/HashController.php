<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class HashController extends Controller
{
    public function index(Request $request)
    {

        if (Auth::check()) {
            if (Gate::allows('access-hash')) {
                return response()->json(['message' => 'HashController is working']);
            } else {
                return response()->json(['error' => 'Permission denied'], 403);
            }
        } else {
            return response()->json(['error' => 'Unauthorized !_!'], 401);
        }
        
    }
}