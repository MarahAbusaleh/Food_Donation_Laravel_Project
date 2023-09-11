<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::get();
        // dd($admins);
       return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
        
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

        $newImageName = uniqid() . '-' . $request->addedCategoryName . '.' . $request->file('image')->extension();
        $relativeImagePath = 'assets/images/' . $newImageName;
        $request->file('image')->move(public_path('assets/images'), $newImageName);

        // Validate and store the new employee record
    $validatedData =  $request->validate([
        'name' => 'required',
        // 'image' => 'required', // Adjust validation rules as needed,
        'description' => 'required',
        
    ]);

    Category::create([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'image' => $relativeImagePath,
    ]);

    // if ($request->hasFile('image')) {
    //     $image = $request->file('image');
    //     $imageName = time() . '.' . $image->getClientOriginalExtension();
    //     $image->move(public_path('images'), $imageName); // Upload the image to the public/images directory
    //        }
    // $fn=time().'.'.$request->photo->getClientOriginalName();
    //     $request->photo->move(public_path('uploads'),$fn);

    // Category::create($validatedData);

    return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        // dd($categories);

        return view('dashboard.categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          
        $validatedData=$request->validate([
          'name' => 'required',
        //   'image' => 'required', // Adjust validation rules as needed,
          'description' => 'required',
      
        ]);
        // $fn=time().'.'.$request->photo->getClientOriginalName();
        // $request->photo->move(public_path('uploads'),$fn);
        // Upload and store the image
    // $image = $request->file('image');
    // $imageName = time() . '.' . $image->getClientOriginalExtension();
    // $image->move(public_path('images/'), $imageName);
    $data = $request->except(['_token', '_method']);

        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            $newImage = $this->storeImage($request);

            // Update the image column only if a new image was uploaded
            $data['image'] = $newImage;
        }

        Category::where('id', $id)->update($data);


        return redirect()->route('categories.index');//,compact('category'))->with('success', 'Category updated successfully');
    }

    

    
    // if ($request->hasFile('image')) {
    //     $image = $request->file('image');
    //     $imageName = time();
    //     $image->move(public_path('images'), $imageName); // Upload the image to the public/images directory
    //     $category->image = $imageName;
    //     // $storedPath = $uploadedFile->store('public/photo');
    //     $category->save();

    // }


    
    
   
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return back()->with('success', 'Category deleted successfully.');
    }




public function storeImage($request)
        {
        $newImageName = uniqid() . '-' . $request->addedCategoryName . '.' . $request->file('image')->extension();
        $relativeImagePath = 'assets/images/' . $newImageName;
        $request->file('image')->move(public_path('assets/images'), $newImageName);


        return $relativeImagePath;

    }
}