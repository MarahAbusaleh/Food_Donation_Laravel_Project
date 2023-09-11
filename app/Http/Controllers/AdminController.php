<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=Admin::get();
        // dd($admins);
       return view('dashboard.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,jfif |max:2048',
            // Add any desired image validation rules
            'email' => 'required|email',
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
            ]
        ]);

        $admins = new Admin();

        $admins->name = $request->input('name');
        $admins->email = $request->input('email');
        $admins->password = Hash::make ($request->input('password'));


        

        

        $admins->save();

        return redirect()->route('admins.index')->with('success', 'Admin created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $admins = Admin::findOrFail($id);
        // dd($admins);

        return view('dashboard.admins.edit', compact('admins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admins , $id)
  {
    // dd($request->all());
   
    //   $request->validate([
    //       'name' => 'required',
    //       'image' => 'required|image|mimes:jpeg,png,jpg,gif,jfif |max:2048',
    //       Add any desired image validation rules
    //       'email' => 'required|email'. $id,
    //       'password' => [
    //           'required',
    //           'min:8',
    //           'regex:/^(?=.[A-Z])(?=.[a-z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%*?&]+$/']]);

        $admins = Admin::findOrFail($id);


        // $admins = new Admin();

        $admins->name = $request->input('name');
        $admins->email = $request->input('email');
        $admins->password = Hash::make ($request->input('password'));
        
        

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('images'), $imageName); // Upload the image to the public/images directory
        //     $admins->image = $imageName;
        //     // $storedPath = $uploadedFile->store('public/photo');
        //     $admins->save();

        // }
        try {
            $admins->save();
        } catch (\Exception $e) {
            // Log or dd the exception to see the error message
            dd($e->getMessage());
        }

        // $admins->save();

        return redirect()->route('admins.index')->with('success', 'Admin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::destroy($id);
        return back()->with('success', 'Admin deleted successfully.');
    }
}
