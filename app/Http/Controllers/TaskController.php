<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;



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


                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal">
                        <i class="fas fa-pencil-alt"></i> Edits
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel{{ $task->id }}"  aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                              <form action="'.route('tasks.update', ['id' => $task->id]).'" method="POST" style="display: inline-block;" >
                              '.csrf_field().'
                              '.method_field('PUT').'
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel{{ $task->id }}">Edit Record</h5>
                                </div>
                                <div class="modal-body">
                                    <div id="form_result"></div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="task_name">Task Name</label>
                                            <input type="text" id="task_name" name="task_name" class="form-control" placeholder="Task Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select id="category" name="category" class="form-control">
                                                <option value="">----</option>
                                                <option value="kuliah">Kuliah</option>
                                                <option value="kerja">Kerja</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="due_date">Due Date</label>
                                            <input type="date" id="due_date" name="due_date" class="form-control" placeholder="Due Date">
                                        </div>
                                        <div class="form-group">
                                            <label for="difficulty_level">Difficulty Level</label>
                                            <select id="difficulty_level" name="difficulty_level" class="form-control">
                                                <option value="">----</option>
                                                <option value="hard">Susah</option>
                                                <option value="medium">Medium</option>
                                                <option value="easy">Gampang</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select id="status" name="status" class="form-control">
                                                <option value="">----</option>
                                                <option value="urgent">Urgent</option>
                                                <option value="tidak-urgent">Tidak Urgent</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                        <form action="'.route('tasks.destroy', ['id' => $task->id]).'" method="POST" style="display: inline-block;" >
                            '.csrf_field().'
                            '.method_field('DELETE').'
                            <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Delete
                        </button>
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

    // public function edit($id)
    // {
    //     if(request()->ajax())
    //     {
    //         $task = Task::findOrFail($id);
    //         return response()->json(['result' => $task]);
    //     }
    // }

    // public function update(Request $request, $id)
    // {
    //     $task = Task::findOrFail($id);
    //     $task->update($request->all());
    //     return redirect()->route('task.index')->with('success', 'Task updated successfully');
    // }


//     public function edit($id)
// {
//     if(request()->ajax())
//     {
//         $task = Task::findOrFail($id);
//         return response()->json(['result' => $task]);
//     }
//     else
//     {
//         // Penanganan non-AJAX, misalnya mengarahkan pengguna ke halaman edit
//         $task = Task::findOrFail($id);
//         return view('task.edit', compact('task'));
//     }
// }


//     public function update(Request $request, $id)
//     {
//         $task = Task::findOrFail($request->hidden_id);

//         $request->validate([
//             'task_name' => 'required',
//             'difficulty_level' => 'required',
//             'due_date' => 'required',
//             'category' => 'required',
//             'status' => 'required',
//         ]);

//         $task->task_name = $request->task_name;
//         $task->difficulty_level = $request->difficulty_level;
//         $task->due_date = $request->due_date;
//         $task->category = $request->category;
//         $task->status = $request->status;
//         $saved = $task->save();

//         if ($saved) {
//             return redirect()->route('task.index')->with('success', 'Data task berhasil diubah.');
//         } else {
//             return redirect()->back()->with('error', 'Terjadi kesalahan saat mengubah data task.');
//         }
//     }


public function edit($id)
    {
        if(request()->ajax())
        {
            $task = Task::findOrFail($id);
            return response()->json(['result' => $task]);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'task_name' => 'required',
            'difficulty_level' => 'required',
            'due_date' => 'required',
            'category' => 'required',
            'status' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'task_name' => $request->task_name,
            'difficulty_level' => $request->difficulty_level,
            'due_date' => $request->due_date,
            'category' => $request->category,
            'status' => $request->status,
        );

        User::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }




    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('task.index')->with('success', 'Data task berhasil dihapus.');
    }
}
