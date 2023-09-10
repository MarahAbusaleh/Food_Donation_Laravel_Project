<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Models\UserDonation;
use App\Models\User;

class DonationController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        //
    }

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
    /*-Show Method to display the Single Donation Details in 'Single.blade.php'-*/
    public function show2($id)
    {
        $singleDonation = Donation::where('id', $id)->first();
        // dd($singleDonation);
        return view('Pages.single', compact('singleDonation'));

    }
    public function showw($id)
    {

        $donations = Donation::where('category_id', $id)->paginate(1);
        // $category = Donation::where('category_id', $id)->first();
        return view('pages/sub-category', compact('donations'));
    }

    public function edit(Donation $donation)
    {
        //
    }

    public function update(Request $request, Donation $donation)
    {
        //
    }

    public function destroy(Donation $donation)
    {
        //
    }
}
