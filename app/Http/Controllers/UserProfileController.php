<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Models\UserDonation;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function show()
    {
        // dd('test');
        // Load the user's orders using the defined relationship
        // $orders = $user->orders;
        // if (auth()->check()) {


        // if (Auth::check()) {
        //     $user_id = auth()->user()->id;
        //     $test = UserDonation::where('user_id', $user_id)->get();
        //     return view('dashboard', ['test' => $test]);
        // }
        // return redirect()->route('login');

        // if (auth()->check()) {
            try {
                $user_id = auth()->user()->id;
                $test = UserDonation::where('user_id', $user_id)->get();

                if ($test->isEmpty()) {
                    // Handle the case where no records are found
                    // You can set a message or take appropriate action
                }

                return view('dashboard', ['test' => $test]);
            } catch (Exception $e) {
                // dd($e);
            }
        // }

        // return view('auth.login');



        // $user_donations = UserDonation::where('user_id', $user_id)->get();
        // return view('dashboard', compact('user_donations'));
        // } else {
        // return view('auth.login');
        // }

    }
}