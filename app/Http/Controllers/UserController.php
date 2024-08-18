<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }

    public function edit($uuid)
    {
        $users = User::where('uuid', $uuid)->first();

        if (!$users) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        return view('superadmin.edit', compact('user'));
    }


    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required|in:1,2',
        ]);

        if (Auth::user()->role !== '1') {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $user = User::create([
            'uuid' => Str::uuid()->toString(),
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return response()->json($user, 201);
    }

    /**
     * Display the specified user.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $user = User::where('uuid', $uuid)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        return response()->json($user);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email,' . $uuid,
            'password' => 'required',
            'role' => 'required|in:1,2',
        ]);

        if (Auth::user()->role !== '1') {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $user = User::where('uuid', $uuid)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return response()->json($user);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        if (Auth::user()->role !== '1') {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $user = User::where('uuid', $uuid)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted.']);
    }

}
