<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TodoList;
use App\Task;
use Carbon\Carbon;

class TasksController extends Controller
{
    public function store(Request $request, $todoListId)    
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $todoList = TodoList::findOrFail($todoListId);
        $task = $todoList->tasks()->create($request->all());
        return view('tasks.item',compact('task'));
    }

    public function update(Request $request, $todoListId, $id)
    {
        $task = Task::findOrFail($id);
        $task->completed_at = $request->completed == "true" ? Carbon::now() : NULL;
        $affectedRow = $task->update();
        echo $affectedRow;
    }

    public function destroy($todoListId, $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return $task;
    }
}
