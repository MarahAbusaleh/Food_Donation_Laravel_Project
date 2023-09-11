<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomEmail;
use App\Models\User;

// use Illuminate\Contracts\Mail\CustomEmail;

class EmailController extends Controller
{
    public function index()
    {
        return view('Pages.sendEmail');
    }
    public function sendEmailToAllUsers(Request $request)
    {
        $emailContent = $request->message;
        $emailSubject = $request->subject;

        // $userEmails = User::pluck('email')->toArray();
        $users = User::select('name', 'email')->get();
        // dd($emailContent, $emailSubject, $users);
        // Mail::bcc($users)->send(new CustomEmail($emailSubject, $emailContent, $users));
        foreach ($users as $user) {
            // Send an individual email to each user.
            Mail::to($user->email)->send(new CustomEmail($emailSubject, $emailContent, $user->name));
        }

        return redirect()->back()->with('success', 'Email sent to all users successfully.');
    }
}