@extends('welcome')
<!-- Main content -->
@section('content')

<section class="content">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            {{-- <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Starter Page</li>
              </ol>
            </div><!-- /.col --> --}}
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Projects</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 20%">Task Name</th>
              <th style="width: 20%">Due Date</th>
              <th>Difficulty Level</th>
              <th style="width: 20%" class="text-center">Status</th>
              <th style="text-align: center;" class="card-tools">
                <a href="/create_task" class="btn btn-success">Tambah Data<i class="fas fa-plus-square"></i></a>
              </th>
            </tr>
          </thead>

          <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>#</td>
                <td>
                    <a>{{ $task->task_name }}</a>
                    <br/>
                    <small>{{ $task->category }}</small>
                </td>
                <td>
                    <ul class="list-inline">
                        <li class="lis-inline-item">
                            <p>{{ $task->due_date }}</p>
                        </li>
                    </ul>
                </td>
                <td class="project_progress">
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%"></div>
                    </div>
                    <small>{{ $task->difficulty_level }}</small>
                </td>
                <td class="project-state">
                    <span class="badge badge-success">Success</span>
                </td>
                <td class="project-actions text-center">
                    <a class="btn btn-primary btn-sm" href="#">
                        <i class="fas fa-folder"></i> View
                    </a>
                    <a class="btn btn-info btn-sm" href="#">
                        <i class="fas fa-pencil-alt"></i> Edit
                    </a>
                    <a class="btn btn-danger btn-sm" href="#">
                        <i class="fas fa-trash"></i> Delete
                    </a>
                    <form action="{{ route('tasks.destroy', ['id' => $tasks->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>

        </table>
      </div>
    </div>
  </section>
@endsection
