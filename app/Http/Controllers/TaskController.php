<?php

namespace App\Http\Controllers;

use App\Models\task;
// use App\Http\Requests\StoretaskRequest;
// use App\Http\Requests\UpdatetaskRequest;

use Illuminate\Http\Request;
use Redirect;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $list = task::orderBy('priority','desc')->get();     
        
        return view('tasks.index',['list'=>$list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input =  $request->all(); 
        if(empty($input['priority'])){
            return redirect::route('createtodo');
        }       
        task::create($input);
        return redirect::route('createtodo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = task::find($id);        
        return view('tasks.edit',['model'=>$model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetaskRequest  $request
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all(); 
       
        $model = task::find($input['id'])      ;
        $hold_priority = $model->priority; 

        $model->task = $input['task']      ;
        $model->priority = empty($input['priority']) ? $hold_priority : $input['priority'];
        $model->save();
        return redirect::route('createtodo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(task $task)
    {       
        $task->delete();
        return redirect::route('createtodo');
    }
}
