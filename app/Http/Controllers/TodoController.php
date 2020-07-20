<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //

    public function index()
    {
        $todos = Todo::orderby('completed')->get();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function edit(Todo $todo)
    {

        return view('todos.edit', compact('todo'));

    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' =>true]);
        return redirect(route('todo.index'))->with('success','Todo Marked as Completed');
    }

    public function delete(Todo $todo)
    {
        $todo->delete();
        return redirect(route('todo.index'))->with('success','Todo Deleted Successfully');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' =>false]);
        return redirect(route('todo.index'))->with('success','Todo Marked as Incomplete');
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {

        $todo->update(['title' => $request->title]);
        return redirect(route('todo.index'))->with('success','Todo Updated successfully');
    }



    public function store(TodoCreateRequest $request)
    {

        Todo::create($request->all());
        return redirect(route('todo.index'))->with('success', 'Todo Added Successfully');
    }


}
