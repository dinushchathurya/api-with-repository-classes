<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Users',
            'code' => 200,
            'error' => false,
            'results' =>  User::orderBy('name', 'asc')->get()
        ], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|max:50'
        ]);

        DB::beginTransaction();   
        try {
            $newUser = new User;
            $newUser->name = $request->name;
            $newUser->email = preg_replace('/\s+/', '', strtolower($request->email));
            $newUser->password = \Hash::make($request->password);
            $newUser->save();

            DB::commit();
            return response()->json([
                'message' => 'User created',
                'code' => 201,
                'error' => false,
                'results' => $newUser
            ], 201);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage(),
                'error' => true,
                'code' => 500
            ], 500);
        }
    }
    
    public function show($id)
    {
        $user = User::find($id);

        // Check user is alreay exists
        if(!$user) return response()->json(['message' => 'User not found'], 404);

        return response()->json([
            'message' => 'User detail',
            'code' => 200,
            'error' => false,
            'results' => $user
        ], 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email,' . $id
        ]);

        DB::beginTransaction();
        try {
            $user = User::find($id);

            // Check user is already exists
            if(!$user) return response()->json(['message' => 'User not found'], 404);

            // Update user details
            $user->name = $request->name;
            $user->email = preg_replace('/\s+/', '', strtolower($request->email));
            $user->save();

            DB::commit();
            return response()->json([
                'message' => 'User updated',
                'code' => 200,
                'error' => false,
                'results' => $user
            ], 200);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage(),
                'error' => true,
                'code' => 500
            ], 500);
        } 
    }

    public function destroy($id)
    {
        //
    }
}
