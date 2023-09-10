<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Models\UserDonation;
use App\Models\User;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show($id, $user_id)
    {
        $donation = Donation::where('id', $id)->first();
        $userdonation = UserDonation::where('user_id', $user_id)->first();
        // $donation = Donation::where('id', $id)->first();
        $user = User::where('id', $user_id)->first(); // Use $user_id to query the user
        // $userdonation = UserDonation::all(); // Use $user_id to query the user
        // $user = User::all(); // Use $user_id to query the user
        return view('Pages.money-donation',[
            'donations' => $donation, 'userdonations'=>$userdonation, 'users' => $user
        ]);
    }
    public function shows($id, $user_id)
    {
        $donation = Donation::where('id', $id)->first();
        $userdonation = UserDonation::where('user_id', $user_id)->first();
        // $donation = Donation::where('id', $id)->first();
        $user = User::where('id', $user_id)->first(); // Use $user_id to query the user
        // $userdonation = UserDonation::all(); // Use $user_id to query the user
        // $user = User::all(); // Use $user_id to query the user
        return view('Pages.food-donation',[
            'donations' => $donation, 'userdonations'=>$userdonation, 'users' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donation $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation)
    {
        //
    }
}
