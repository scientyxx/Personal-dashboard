<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Task;

class DataTableController extends Controller
{
    public function getDataTable()
    {
        $tasks = Task::select(['id', 'task_name', 'category', 'due_date', 'difficulty_level', 'status'])
            ->get();

        return DataTables::of($tasks)->make(true);
    }
}

