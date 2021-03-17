<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
    public function index()
    {
        $proyectos = Project::all();
        return view('projects.index')->with('proyectos', $proyectos);
    }

    
    public function create()
    {
        return view('projects.create');
    }

   
    public function store(Request $request)
    {
        $proyecto = Project::create([
            'name' => $request->name ,
            'description' => $request->description ,
            'final_date' => $request->due_date ,
            'hex' => $request->hex
            
        ]);

        return redirect()->back(); 
    }

    
    public function show(Project $project)
    {
       $proyecto = Project::find($id);

       return view('projects.show')->with('proyecto', $proyecto); 
    }

    
    public function edit(Project $project)
    {
        $proyecto = Project::find($id);

       return view('projects.edit')->with('proyecto', $proyecto); 
    }

    
    public function update(Request $request, Project $project)
    {
        $proyecto = Project::find($id);

        $proyecto->update([
            'name' => $request->name,
            'description' => $request->description,
            'final_date' => $request->final_date,
            'hex' => $request->hex
        ]);

        if ($request->origen == 'edit') {
            redirect()-route('projects.show', $proyecto->id);
        }else{
            return redirect()->back();
        }
        
    }

    
    public function destroy(Project $project)
    {
        $proyecto = Project::find($id);
        $proyecto->delete();

        return redirect()->route('projects.index');
    }
}
