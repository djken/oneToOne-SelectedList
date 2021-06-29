<?php

namespace App\Http\Controllers;

use App\Models\Founder;
use Illuminate\Http\Request;

class FoundersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $founders = Founder::latest()->paginate(5);
    
        return view('founders.index',compact('founders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('founders.create');
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
        ]); 
    
        Founder::create($request->all());
     
        return redirect()->route('founders.index')
                        ->with('success','Founder created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Founder  $founder
     * @return \Illuminate\Http\Response
     */
    public function show(Founder $founder)
    {
        return view('founders.show',compact('founder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Founder  $founder
     * @return \Illuminate\Http\Response
     */
    public function edit(Founder $founder)
    {
        return view('founders.edit',compact('founder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Founder  $founder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Founder $founder)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
        ]); 
    
        $founder->update($request->all());
    
        return redirect()->route('founders.index')
                        ->with('success','Founder updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Founder  $founder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Founder $founder)
    {
        $founder->delete();
    
        return redirect()->route('founders.index')
                        ->with('success','Founder deleted successfully');
    }
}
