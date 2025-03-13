<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
public function index()
{
    $tasks = Task::all();
    return view('tasks', compact('tasks'));
}
public function create()
{
    $name = $_POST['name'];
    $task = new Task();
    $task->name = $name;
    $task->save();
    return redirect()->back();
}

public function edit($id)
{
    $task = Task::find($id);
    $tasks = Task::all();
    return view('tasks', compact('task', 'tasks'));
}
public function update()
{
    $id = $_POST['id'];
    $task = Task::find($id);
    $task->name = $_POST['name'];
    $task->save();
    return redirect('tasks');
}
public function destroy($id)
{
        Task::destroy($id);
        return redirect('tasks');
}
}