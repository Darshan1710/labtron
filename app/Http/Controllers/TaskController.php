<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    /**
     * getTaskList
     */
    public function getTaskList(){
        $tasks = Task::all();
        return view('tasklist',['tasks'=>$tasks]);
    }

    /**
     * addTask
     */
    public function addTask(){
        return view('taskForm');
    }

    /**
     * addTask
     */
    public function insertTask(Request $request){
        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = date('Y-m-d',strtotime($request->due_date));
        $task->save();

        return redirect('/getTaskList');
    }  
    
    /**
     * editTask
     */
    public function editTask($id){
        $task = Task::find($id);
        return view('editTask',['tasks'=>$task]);
    }

    /**
     * updateTask
     */
    public function updateTask(Request $request){
        $task = Task::find($request->id);
        if($task->count() > 0){
            $task->title = $request->title;
            $task->description = $request->description;
            $task->due_date = date('Y-m-d',strtotime($request->due_date));
            $task->save();
        }

        return redirect('/getTaskList');
    }

    public function deleteTask($id){
        $task = Task::find($id);
        $task->delete();

        return redirect('/getTaskList');
    }
}
