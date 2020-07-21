<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Step;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = auth()->user()->todos->sortBy('completed');
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoCreateRequest $request)
    {
        $todo = auth()->user()->todos()->create($request->all());

        if ($request->steps){
            foreach ($request->steps as $step){

                $todo->steps()->create(['steps' => $step]);

            }
        }


        return redirect(route('todo.index'))->with('success', 'Todo Added Successfully');
    }

    public function edit(Todo $todo)
    {

        return view('todos.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {

       $todo->update(['title' => $request->title, 'description' => $request->description]);
        if ($request->stepsName){
            foreach ($request->stepsName as $key => $value){
                $id = $request->stepsID[$key];
                if (!$id){
                    $todo->steps()->create(['steps' => $value]);
                }else{
                    Step::find($id)->update(['steps' => $value]);
                }


            }
        }
        return redirect(route('todo.index'))->with('success','Todo Updated successfully');
    }

    public function destroy(Todo $todo)
    {
        $todo->steps()->delete();
        $todo->delete();
        return redirect(route('todo.index'))->with('success','Todo Deleted Successfully');
    }

    public function show(Todo $todo)
    {
        $steps = $todo->steps->all();
        return view('todos.view', compact('todo', 'steps'));
    }


    public function complete(Todo $todo)
    {
        $todo->update(['completed' =>true]);
        return redirect(route('todo.index'))->with('success','Todo Marked as Completed');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' =>false]);
        return redirect(route('todo.index'))->with('success','Todo Marked as Incomplete');
    }

}
