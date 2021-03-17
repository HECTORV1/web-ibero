<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //index es la pantalla principal
    //Listado de tareas
    public function index()
    {
        $tareas = Task::all();
       return view('index')->with('tareas',$tareas); 
    }

    //Vista crear
    //Formulario de creación
    public function create()
    {
        return view('create');
    }

    
    public function store(Request $request)
    {
        // Modo Pro
        $tarea = Task::create([
            'name' => $request->name ,
            'description' => $request->description ,
            'due_date' => $request->due_date ,
            
        ]);

        return redirect()->back();
        /* Modo NOOB
        $tarea = new Task;

        $tarea->name = $request->name;
        $tarea->description = $request->description;
        $tarea->due_date = $request->due_date;

        $tarea->save();
        */

    }

    // Vista de una sola tarea
    public function show($id)
    {
        $tarea = Task::find($id);
        return view('show')->with('tarea', $tarea);
    }

    // Actualizar o editar tarea
    public function edit($id)
    {
        $tarea = Task::find($id);
        return view('edit')->with('tarea', $tarea);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //Modo NOOB
        $tarea = Task::find($id);

        $tarea->name = $request->name;
        $tarea->description = $request->description;
        $tarea->due_date = $request->due_date;

        $tarea->save();
        return redirect()->route('tareas.show', $tarea->id);

          /* Modo Pro
        $tarea = Task::find($id);

        $tarea->update([
            'name'=> $request->name,
            'description' => $request->description,
            'due_date' => $request->due_date,

        ]);
        return redirect()->route('tareas.show', $tarea->id);
        */

    }

    //Borrar la tarea
    public function destroy($id)
    {
        $tarea = Task::find($id);
        $tarea->delete();

        return redirect()->route('tareas.index');
    }

    public function changeStatus($id)
    {
        $tarea = Task::find($id);

        if ($tarea->completed == false) {
            $tarea->completed = true;

        }else{
            $tarea->completed = false;
        }
         

        $tarea->save();

        return redirect()->back();

    }
}
