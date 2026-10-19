<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::paginate(20);
        return view('todo.index',[
            'todos' => $todos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $todo = [
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>false
        ];
        Todo::create($todo);
        return redirect()->route('todo.index')->with('successmessage','Your task has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('todo.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo = Todo::findorfail($id);
        return view("todo.edit",[
            'todo'=>$todo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // check the duplication for the title
        $todo_title = Todo::where('title',$request->title)->where('id', '!=', $id)->first();

        if($todo_title){
            return redirect()->back()->with(['errormessage' => 'This title is already taken.'])->withInput();
        }

        $todo = Todo::findorfail($id);

        $validator = Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $todo_data = [
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=> $request->status == 0 ? false : true
        ];

        $todo->update($todo_data);
        return redirect()->route('todo.index')->with('successmessage','Your task has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todo.index')->with('successmessage','POST deleted successfully');
    }
}
