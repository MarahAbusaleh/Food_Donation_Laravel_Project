<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /*-Show Method to display the Single Donation Details in 'Single.blade.php'-*/
    public function show($id)
    {
        $singleDonation = Donation::where('id', $id)->first();
        // dd($singleDonation);
        return view('Pages.single', compact('singleDonation'));

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
