@extends('welcome')

@section('content')

    <!-- Main content -->
    <section class="content" >
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Create Task</h1>
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

                {{-- <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div> --}}
            </div>
            <div class="card-body">
                <form action="{{ route('simpan_task') }}" method="POST">
                    @csrf
                    <div class="form-group">Task Name
                        <input type="text" id="task_name" name="task_name" class="form-control" placeholder="Task Name">
                    </div>

                    <div class="form-group">Category
                        <select id="category" name="category" class="form-control">
                            <option value="">----</option>
                            <option value="kuliah">Kuliah</option>
                            <option value="kerja">Kerja</option>
                        </select>
                    </div>

                    <div class="form-group">Due Date
                        <input type="date" id="due_date" name="due_date" class="form-control" placeholder="Due Date">
                    </div>

                    <div class="form-group">Difficulty Level
                        <select id="difficulty_level" name="difficulty_level" class="form-control">
                            <option value="">----</option>
                            <option value="hard">Susah</option>
                            <option value="medium">Medium</option>
                            <option value="easy">Gampang</option>
                        </select>
                    </div>

                    <div class="form-group">Status
                        <select id="status" name="status" class="form-control">
                            <option value="">----</option>
                            <option value="urgent">Urgent</option>
                            <option value="tidak_urgent">Tidak Urgent</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>


    </section>

@endsection
