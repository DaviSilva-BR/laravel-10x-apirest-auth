<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:55',
                'email' => 'email|required|unique:users',
                'password' => 'required|confirmed'
            ]);
           
        	$validatedData['password'] = bcrypt($request->password);
            User::create($validatedData);
            return response()->json('success');

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
