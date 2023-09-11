<?php

namespace App\Http\Controllers;

use App\Models\Volanteer;
use Illuminate\Http\Request;

class VolanteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volanteers=Volanteer::get();
        // dd($admins);
       return view('dashboard.volanteers.index', compact('volanteers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.volanteers.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'name' => 'required',
            'email' => 'required',
            'job' => 'required',
            'comments' => 'required',
            'mobile' => 'required',
            
        ]);
    
        Volanteer::create($validatedData);
    
        return redirect()->route('volanteers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Volanteer  $volanteer
     * @return \Illuminate\Http\Response
     */
    public function show(Volanteer $volanteer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Volanteer  $volanteer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $volanteers = Volanteer::findOrFail($id);
        // dd($categories);

        return view('dashboard.volanteers.edit', compact('volanteers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Volanteer  $volanteer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Volanteer $volanteer)
    {
        $validatedData=$request->validate([
            'name' => 'required',
            'email' => 'required',
            'job' => 'required',
            'comments' => 'required',
            'mobile' => 'required',
        
          ]);
  
      
  
     
      
      $volanteer->update($validatedData);
  
      return redirect()->route('volanteers.index')->with('success', 'Volanteer updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Volanteer  $volanteer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Volanteer::destroy($id);
        return back()->with('success', 'Volanteer deleted successfully.');
    }
}
