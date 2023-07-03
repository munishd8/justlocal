<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Jobs\VerifyUser;
use App\Http\Requests\VerifyUserRequest;
use App\Http\Requests\ResetOtpRequest;

class AuthController extends Controller
{
     public function login(LoginRequest $request)
    {
        $user = User::where('email',$request->email)
                        ->where('role_id',2)
                        ->first();

        if(!$user){
                return response()->json(['error' => 'The provided email address is not registered.'], 422);
        }

        if(! Hash::check($request->password, $user->password)){
            return response()->json(['error' => 'Invalid Password'], 422);
        }

        $device = substr($request->userAgent() ?? '',0,255);
        return response()->json([
            'message' => 'User Successfully Login.',
            'access_token' => $user->createToken($device)->plainTextToken,
        ]);
    }


    public function register(RegisterRequest $request)
    {

         $otp = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2,
            'otp' => $otp,
        ]);
        if($user){

        VerifyUser::dispatch($request->name,$request->email,$otp);
        $device = substr($request->userAgent() ?? '',0,255);
                return response()->json([
            'message' => 'User Successfully Register. Please check Your Email Address for otp.',
            'access_token' => $user->createToken($device)->plainTextToken,
        ]);

        }
    }

    public function verify(VerifyUserRequest $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        // return $user->otp.' '.$request->otp;
         if($user->otp != $request->otp)
         {
            return response()->json(['error' => 'Invalid OTP'], 400);
         }

            $user->email_verified_at = now();
            $user->save();
             return response()->json(['message' => 'Email verification successful'], 200);
          
    }

        public function reset(ResetOtpRequest $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

         $otp = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);

        $user->update([
            'otp' => $otp,
        ]);


        VerifyUser::dispatch($user->name,$request->email,$otp);
        
                return response()->json([
            'message' => 'Please check Your Email Address for New otp.',
        ]);

    }
}
