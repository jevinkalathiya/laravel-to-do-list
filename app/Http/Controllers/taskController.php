<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class taskController extends Controller
{
    public function showTasks(){
        $tasks = DB::table('tasklists')
                    ->orderBy('due_date', 'asc')
                    ->paginate(3); // Work get is also done by paginate
        return view('index', ['tasks' => $tasks]);
    }

    public function addTask(Request $request){
        $task = $request->input('task_name');
        $due_date = $request->input('due_date');

        DB::table('tasklists')->insert(
            [
                'task_name' => $task,
                'due_date' => $due_date,
                'created_at'  => now(),       
                'updated_at'  => now(),
            ]
        );
        return redirect()->route('index', ['page' => request('page')]);
    }

    public function getTask(int $id){
        $task = DB::table('tasklists')
                    ->where('id',$id)
                    ->first();

        $tasks = DB::table('tasklists')
                    ->orderBy('due_date', 'asc')
                    ->paginate(5);

        return view('index', ['task' => $task, 'tasks' => $tasks, 'page' => request('page')]);
    }

    public function updateTask(Request $request, int $id){
        $task = $request->input('task_name');
        $due_date = $request->input('due_date');

        DB::table('tasklists')
            ->where('id', $id)
            ->update(
            [
                'task_name' => $task,
                'due_date' => $due_date,
                'updated_at' => now(),
            ]
        );
        return redirect()->route('index', ['page' => request('page')]);
    }

    public function updateStatus(string $action, int $id){
        $statuses = [
            'pending'  => ['is_pending' => true,  'is_in_progress' => false, 'is_completed' => false],
            'progress' => ['is_pending' => false, 'is_in_progress' => true,  'is_completed' => false],
            'complete' => ['is_pending' => false, 'is_in_progress' => false, 'is_completed' => true],
        ];

        if ($action === 'delete') {
            DB::table('tasklists')->where('id', $id)->delete();
        } elseif (isset($statuses[$action])) {
            DB::table('tasklists')->where('id', $id)->update($statuses[$action]);
        }

        return redirect()->route('index', ['page' => request('page')]);
    }


}