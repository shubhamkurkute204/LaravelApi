<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserAuthenticate extends Controller
{
    // User SignUp Method
    public function SignUp(Request $request)
    {
        $validateData = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:255'
        ];

        $validator = Validator::make($request->all(), $validateData);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->errors()
            ], 400);
        }

        // Store user data after validation
        $input = $request->all();
        $input["password"] = Hash::make($input["password"]);

        $user = User::create($input);

        // Generate token for the new user
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        return response()->json([
            'success' => true,
            'message' => 'User registered successfully!',
            'data' => $success
        ], 201);
    }

    // User Login Method
    public function Login(Request $request)
    {
        $validateData = [
            'email' => 'required|email|max:255',
            'password' => 'required|string|max:255'
        ];

        $validator = Validator::make($request->all(), $validateData);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->errors()
            ], 400);
        }

        // Check if the user exists and verify the password
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => true,
                'message' => 'Invalid email or password!'
            ], 401);
        }

        // Generate token for the authenticated user
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        return response()->json([
            'success' => true,
            'message' => 'Login successful!',
            'data' => $success
        ], 200);
    }
}
