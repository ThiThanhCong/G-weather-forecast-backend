<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OTPMail;
use App\Mail\dailyEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\OTP;

class UserController extends Controller
{
    public function sendMail(Request $request){
        try{           
            $email = $request->input('email');
            $checkUser = User::where('email',$email)->first();
            if($checkUser){
                return response()->json([
                    'message' => 'User already exists'
                ], 409);
            }
            
            $oldOTP = OTP::where('email',$email)->first();
            if ($oldOTP) {
                $oldOTP->delete();
            }
            
            $OTP = ''.substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'), 0, 6);
            $otp = new OTP();
            $otp->email = $email;
            $otp->OTP = $OTP;
            $otp->save();
            Mail::to($email)->send(new OTPMail($OTP));
            return response()->json([
                'Message' => "OTP sent" 
            ],200);
        } catch (\Throwable $th)
        {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function verifyOTP(Request $request)
    {
        try{
        $otpFromUser = $request->input('otp');
        $email = $request->input('email');
        $otpRecord = OTP::where('email', $email)->first();
        if ($otpRecord && $otpFromUser === $otpRecord->otp) {
            $otpRecord->delete(); 
            
           
            $user = new User();
            $user->email = $email;
            $user->save();
    
            return response()->json([
                'status' => 200,
                'message' => 'OTP verified successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'OTP verification failed'
            ], 400);
        }
        
    }catch (\Throwable $th)
    {
        return response()->json($th->getMessage(), 500);
    }
}
    

    public function unRegister(Request $request)
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        
        if ($user) {
            $user->delete();
            return response()->json([
                'status' => 204,
                'message' => 'User unSubscribed'
            ], 204);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User not found'
            ], 404);
        }
    }

    public function dailyEmail(){
        $users = User::all();

        foreach ($users as $user) {
            $city = 'Hồ Chí Minh';
            Mail::to($user->email)->send(new DailyEmail($city));
        }
        return;
    }
    
    public function test(Request $request)
    {
        return response()->json([
            'status' => 404,
            'message' => 'User not found'
        ], 404);
    }
}
