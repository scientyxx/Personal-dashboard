<?php

use App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Model;



class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        dd($tasks);
    return view('task.task', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('task.creat_task');
    // }

    public function create_task()
    {
        return view('task.create_task');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


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
             // Aksi yang akan diambil jika data berhasil disimpan
             return redirect()->route('task.index')->with('success', 'Data task berhasil disimpan.');
         } else {
             // Aksi yang akan diambil jika terjadi kesalahan saat menyimpan data
             return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data task.');
         }
     }

//     Task::create($request->all());
//     {
//     // Redirect atau tampilkan pesan sukses jika diperlukan
// }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    // $task = Task::findOrFail($id);
    // $task->delete();

    // return redirect()->route('task.index')->with('success', 'Data task berhasil dihapus.');


        $task = Task::find($id);

        if ($task) {
            $task->delete();

            return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus.');
        }

        return redirect()->route('tasks.index')->with('error', 'Tugas tidak ditemukan.');

}

}
