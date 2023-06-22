<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\DataTables;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $tasks = Task::select(['id', 'task_name', 'category', 'due_date', 'difficulty_level', 'status'])->get();

            return DataTables::of($tasks)
                ->addColumn('action', function ($task) {
                    return '
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder"></i> View
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt"></i> Edit
                        </a>


                        <form action="'.route('tasks.destroy', ['id' => $task->id]).'" method="POST" class="btn btn-danger btn-sm">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                            <i class="fas fa-trash"></i> Delete
                        </form>

                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $tasks = Task::all();
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
        $saved = $task->save();

        if ($saved) {
            return redirect()->route('task.index')->with('success', 'Data task berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data task.');
        }
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('task.index')->with('success', 'Data task berhasil dihapus.');
    }
}
