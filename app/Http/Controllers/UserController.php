<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|min:6|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);
        if ($validator->passes()) {
              $user = User::create([
                  'first_name' => $request->input('first_name'),
                  'last_name' => $request->input('last_name'),
                  'email' => $request->input('email'),
                  'username' => $request->input('username'),
                  'password' => Hash::make($request->input('password')),
              ]);
              $user->generateToken();
              return response()->json([
                'success'=> true,
                'user' => $user,
              ]);
        }
        else {
          return response()->json([
                'success'=> false,
                'errors'=>$validator->errors()->all()
                ]);
        }
    }

    public function login(Request $request){
        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL ) ? 'email' : 'username';
        $request->merge([$login_type => $request->input('login')]);

        if (Auth::attempt($request->only($login_type, 'password'))) {
            return response()->json([
              'success'=> true,
              'user' => Auth::user(),
            ]);
        }
        else {
          return response()->json([
                'success'=> false,
                ]);
        }
    }

    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function store(Request $request)
    {
        return User::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return $user;
    }

    public function delete(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return 204;
    }
}
