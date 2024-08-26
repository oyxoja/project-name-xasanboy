<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams=Team::all();
        return view('admin.team.index', compact('teams') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Team $team)
    {
        $request->validate([
            'teacherName'=>'required',
            'subjectName'=>'required',
            'picture'=>'required'
        ]);

        // dd($request->all());

        $requestData = $request->all();

        if($request->hasFile('picture')){
            $file=$request->file('picture');

            $image_name = rand();

            $file->move('temp/img',$image_name);

            $requestData['picture'] = $image_name;
        }

        $requestData['slug'] = Str::slug($request->teacherName);

        $team = Team::create($requestData);
        
        return redirect()->route('admin.team.index')->with('succes','Team member added successfully !');
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
    public function edit(Team $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, Team $team)
    {
    
        $requestData = $request->all();
    
        if($request->hasFile('picture')) {
    

        if($team->picture && file_exists(public_path('temp/img/'.$team->picture))) {
                unlink(public_path('temp/img/'.$team->picture));
        } 
            $file = $request->file('picture');
            $image_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('temp/img/'), $image_name);
            $requestData['picture'] = $image_name;
        }
        $requestData['slug'] = Str::slug($requestData['teacherName']);
        $team->update($requestData); 
        return redirect()->route('admin.team.index')->with('success', 'Team updated successfully!');
    }
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
