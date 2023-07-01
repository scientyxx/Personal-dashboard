<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $tasks = Task::where('user_id', auth()->user()->id)->get();

            return DataTables::of($tasks)
                ->addColumn('action', function ($task) {
                    return view('task.action', compact('task'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $tasks = Task::where('user_id', auth()->user()->id)->get();
        return view('task.task', compact('tasks'));
    }

    public function create_task()
    {
        return view('task.create_task');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'task_name' => 'required',
            'difficulty_level' => 'required',
            'due_date' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);

        $task = new Task();
        $task->task_name = $request->task_name;
        $task->difficulty_level = $request->difficulty_level;
        $task->due_date = $request->due_date;
        $task->category = $request->category;
        $task->status = $request->status;
        $task->user_id = auth()->user()->id;
        $saved = $task->save();

        if ($saved) {
            return redirect()->route('task.index')->with('success', 'Data task berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data task.');
        }


    }

    public function update(Request $request, $id)
    {
        $rules = [
            'task_name' => 'required',
            'difficulty_level' => 'required',
            'due_date' => 'required',
            'category' => 'required',
            'status' => 'required',
        ];

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $task = Task::where('user_id', auth()->user()->id)->find($id);

        if (!$task) {
            return response()->json(['error' => 'Task not found']);
        }

        $task->task_name = $request->task_name;
        $task->difficulty_level = $request->difficulty_level;
        $task->due_date = $request->due_date;
        $task->category = $request->category;
        $task->status = $request->status;

        $task->save();

        return redirect()->route('task.index');
    }

    public function destroy($id)
    {
        $task = Task::where('user_id', auth()->user()->id)->findOrFail($id);
        $task->delete();

        return redirect()->route('task.index')->with('success', 'Data task berhasil dihapus.');
    }

    // public function profil($id)
    // {
    //     $
    // }


}
