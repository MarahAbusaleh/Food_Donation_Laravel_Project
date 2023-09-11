<?php

namespace App\Http\Controllers;

use App\Models\UserDonation;
use App\Models\User;
use App\Models\PaymentDetails;
use App\Models\Donation;


use App\Models\Other;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtherController extends Controller
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
            'description' => 'required',
        ], [
            'donation-phone.required' => 'Please enter your phone number.',
            'donation-phone.regex' => 'Please enter a valid phone number as 07XXXXXXXX.',
            'donation-address.required' => 'Please enter your address.',
            'donation-address.string' => 'The address must be a valid string.',
            'description.required' => 'Please provide some additional information.',

        ]);
        $user_idd = auth()->user()->id;

        User::where('id', $user_idd)->update([
            'mobile'=>$request->input('donation-phone'),
            'address'=>$request->input('donation-address')
        ]);
        // $user = new User();
        // $user->mobile = $request->input('donation-phone');
        // $user->address = $request->input('donation-address');
        // $user->save();

        // $userDonation = new UserDonation();
        $other = new Other();
        $other->user_id = $user_idd;
        $other->description = $request->input('description');
        $other->save();

        // $userDonation->user_id = $request->input('user_id');
        // $userDonation->donation_id = $request->input('donation_id');
        // $userDonation->quantity = $request->input('quantity');
        // $userDonation->description = $request->input('description');
        // $userDonation->save();

        return redirect('/')->with('success', 'Your donation has been submit successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // dd(auth()->check());
        if (Auth::check()) {
            // $user_id = auth()->user()->id;
            // $userdonation = UserDonation::where('user_id', $user_id)->first();
            // $donation = Donation::where('id', $id)->first();
            // $user = User::where('id', $user_id)->first(); 
            // $userdonation = UserDonation::all(); // Use $user_id to query the user
            // $user = User::all(); // Use $user_id to query the user
            return view('Pages.other');
        } else {

            return view('auth.login');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function edit(Other $other)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Other $other)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function destroy(Other $other)
    {
        //
    }
}