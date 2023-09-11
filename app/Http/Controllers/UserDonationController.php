<?php

namespace App\Http\Controllers;

use App\Models\UserDonation;
use App\Models\User;
use App\Models\PaymentDetails;
use Illuminate\Http\Request;

class UserDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validation (example)
        $request->validate([
            'donation-phone' => 'required|regex:/^07\d{8}$/',
            'donation-address' => 'required|string',
        ], [
            'donation-phone.required' => 'Please enter your phone number.',
            'donation-phone.regex' => 'Please enter a valid phone number as 07XXXXXXXX.',
            'donation-address.required' => 'Please enter your address.',
            'donation-address.string' => 'The address must be a valid string.',
        ]);

        $user = new User();
        $user->mobile = $request->input('donation-phone');
        $user->address = $request->input('donation-address');
        $user->password = bcrypt('1234'); // Hash the password securely

        $userDonation = new UserDonation();
        $userDonation->user_id = $request->input('user_id');
        $userDonation->donation_id = $request->input('donation_id');
        $userDonation->quantity = $request->input('quantity');
        $userDonation->description = $request->input('textarea');
        $userDonation->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserDonation  $userDonation
     * @return \Illuminate\Http\Response
     */
    public function show(UserDonation $userDonation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserDonation  $userDonation
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDonation $userDonation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserDonation  $userDonation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        // Validation (example)
        $request->validate([
            'donation-phone' => 'required|regex:/^07\d{8}$/',
            'donation-address' => 'required|string',
        ], [
            'donation-phone.required' => 'Please enter your phone number.',
            'donation-phone.regex' => 'Please enter a valid phone number as 07XXXXXXXX.',
            'donation-address.required' => 'Please enter your address.',
            'donation-address.string' => 'The address must be a valid string.',
        ]);

        $user_idd = auth()->user()->id;

        User::where('id', $user_idd)->update([
            'mobile' => $request->input('donation-phone'),
            'address' => $request->input('donation-address')
        ]);

        $userDonation = new UserDonation();
        $userDonation->user_id = $user_idd;
        $userDonation->donation_id = $request->input('donation_id');
        // $userDonation->quantity = $request->input('quantity');
        $userDonation->description = $request->input('textarea');
        $userDonation->save();

        return redirect('/')->with('success', 'Your donation has been submit successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserDonation  $userDonation
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDonation $userDonation)
    {
        //
    }
}