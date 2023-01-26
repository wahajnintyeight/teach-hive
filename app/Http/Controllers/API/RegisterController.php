<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Log;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
            'role_id' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors()->__toString());
        }

        $input = $request->all();
        $input['role_id'] = 0;
        $input['password'] = bcrypt($input['password']);
        // Log::channel('stderr')->info($input);
        // dd(count(User::where("email", $input['email'])->get()));
        if (count(User::where("email", $input['email'])->get()) > 0) {
            $success['token'] = "";
            $success['name'] = "";
            return $this->sendResponse($success, 'Email already exists.', false);
        }
        $user = User::create($input);
        Log::channel('stderr')->info($user);
        $success['token'] = $user->createToken("teach-hive")->plainTextToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'User register successfully.', true);
    }

    public function login(Request $request)
    {
        if (\Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken("teach-hive")->plainTextToken;
            $success['name'] = $user->name;

            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
    public function logout(){
        Auth::logout();
        // return $this->sendResponse($success, 'User login successfully.');

    }
}