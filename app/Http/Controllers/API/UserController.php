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
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
