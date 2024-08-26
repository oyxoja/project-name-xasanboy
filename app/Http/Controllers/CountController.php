<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Count;
use Illuminate\Support\Str;

class CountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $counts = Count::all();
        return view('admin.count.index', compact('counts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.count.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'countNumber'=>'required'
        ]);

        // dd($request->all());

        $requestData = $request->all();

        $requestData['slug'] = Str::slug($requestData['name']);

        Count::create($requestData);

        return redirect()->route('admin.count.index')->with('success','Count created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Count $count)
    {
        return view('admin.count.edit', compact('count'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Count $count)
    {
        $requestData = $request->all();
        $requestData['slug'] = Str::slug($requestData['name']);

        $count->update($requestData);

        return redirect()->route('admin.count.index')->with('success','Count updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Count $count)
    {
        $count->delete();
        return redirect()->route('admin.count.index')->with('delete','Count deleted successfully');
        
    }
}
