<?php

namespace App\Http\Controllers;
use App\Models\UserDonation;
use App\Models\User;
use App\Models\PaymentDetails;
use App\Models\Donation;


use App\Models\Other;
use Illuminate\Http\Request;

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
            'textarea' => 'required',
        ],[
            'donation-phone.required' => 'Please enter your phone number.',
            'donation-phone.regex' => 'Please enter a valid phone number as 07XXXXXXXX.',
            'donation-address.required' => 'Please enter your address.',
            'donation-address.string' => 'The address must be a valid string.',
            'textarea.required' => 'Please provide some additional information.',

        ]);

        $user = new User();
        $user->mobile = $request->input('donation-phone');
        $user->address = $request->input('donation-address');
        $user->password = bcrypt('1234'); // Hash the password securely

        $userDonation=new UserDonation();
        $userDonation->user_id=$request->input('user_id');
        $userDonation->donation_id=$request->input('donation_id');
        $userDonation->quantity= $request->input('quantity');
        $userDonation->description= $request->input('textarea');
        $userDonation->save();

        return redirect('/')->with('success', 'Your donation has been submit successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $userdonation = UserDonation::where('user_id', $user_id)->first();
        // $donation = Donation::where('id', $id)->first();
        $user = User::where('id', $user_id)->first(); // Use $user_id to query the user
        // $userdonation = UserDonation::all(); // Use $user_id to query the user
        // $user = User::all(); // Use $user_id to query the user
        return view('Pages.other',[
            'userdonations'=>$userdonation, 'users' => $user
        ]);
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
