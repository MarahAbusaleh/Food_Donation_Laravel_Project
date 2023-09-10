<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations=Donation::get();
        $category=Category::all();
        // dd($categoryName);
       return view('dashboard.donations.index', compact('donations', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categoryNames=Category::get();
        
        // $categories= $donations->category->name;
        return view('dashboard.donations.create',compact('categoryNames'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $relativeImagePath = null; // Initialize relativeImagePath as null

        $newImageName = uniqid() . '-' . $request->input('name') . '.' . $request->file('image')->extension();
        $relativeImagePath = 'assets/images/' . $newImageName;
        $request->file('image')->move(public_path('assets/images'), $newImageName);
        $validatedData =  $request->validate([
            'name' => 'required',
            'description' => 'required',
            // 'image' => 'required',
            'price' => 'required',
        ]);

    
        Donation::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'image' => $relativeImagePath,
        ]);
    
        return redirect()->route('donations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donations = Donation::findOrFail($id);

        return view('dashboard.donations.edit', compact('donations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validatedData=$request->validate([
            'name' => 'required',
            // 'image' => 'required',
            'price' => 'required',
            'description' => 'required',
          ]);
          $data = $request->except(['_token', '_method']);

        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            $newImage = $this->storeImage($request);

            // Update the image column only if a new image was uploaded
            $data['image'] = $newImage;
        }

        Donation::where('id', $id)->update($data);

  
    //   if ($request->hasFile('image')) {
    //       $image = $request->file('image');
    //       $imageName = time() . '.' . $image->getClientOriginalExtension();
    //       $image->move(public_path('images'), $imageName); 
  
    //   }
      
    
  
      return redirect()->route('donations.index')->with('success', 'Donation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Donation::destroy($id);
        return back()->with('success', 'Donation deleted successfully.');
    }

public function storeImage($request)
        {
        $newImageName = uniqid() . '-' . $request->addedCategoryName . '.' . $request->file('image')->extension();
        $relativeImagePath = 'assets/images/' . $newImageName;
        $request->file('image')->move(public_path('assets/images'), $newImageName);


        return $relativeImagePath;

    }
}