<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends BaseController
{
    public function register(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors()->__toString());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        // dd($input)
        if (User::all()->find("email",$input['email'])){
            $success['token'] = "";
            $success['name'] = "";
            return $this->sendResponse($success, 'Email already exists.',false);
        }
        $user = User::create($input);
        $success['token'] = $user->createToken(config("server_name"))->plainTextToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'User register successfully.',true);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken(config("server_name"))->plainTextToken;
            $success['name'] = $user->name;

            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
}