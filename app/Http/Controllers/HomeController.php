<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\Partner;
use App\Models\Volanteer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $jobs = Job::all();
        $partners = Partner::all();

        // dd($categories, $jobs, $partners);

        return view('Pages.index', compact('categories', 'jobs', 'partners'));

    }


    public function storeVolanteer(Request $request)
    {
        $request->validate([
            'mobile' => 'required|regex:/^07\d{8,}$/',
        ], [
            'mobile.required' => 'The mobile number field is required.',
            'mobile.regex' => 'The mobile number should start with 07 and be at least 10 numbers.',
        ]);

        Volanteer::create([
            'name' => $request->name,
            'email' => $request->email,
            'job' => $request->job,
            'comments' => $request->comments,
            'mobile' => $request->mobile
        ]);

        return redirect('/')->with('message', 'Your application has been recived, our team will contact you soon.');
    }

}