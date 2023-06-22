@extends('welcome')
<style>
.dataTables_length{
    padding-left: 20px!important;
}

.dataTables_filter{
    padding-right: 20px!important;
}
.content-wrapper{
    height: auto!important;
}
.dataTables_info{
    padding-left: 20px!important;
}
.dataTables_paginate{
    padding-right: 20px!important;
}
.paginate_button{
    margin-bottom: 8px;
    margin-top: 5px;
}

</style>
@section('content')
    <section class="content" style="margin-left: 30px; margin-right:30px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>

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
                <table id="tasks-table" class="table" style="">
                    <thead>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-top: 10px; margin-bottom: 10px; margin-right: 60px;">
                            <a href="http://personal-dashboard.test/create_task" class="btn btn-success" role="button" data-bs-toggle="button">Add Project</a>

                          </div>

                        <tr>
                            <th>ID</th>
                            <th>Task Name</th>
                            <th>Category</th>
                            <th>Due Date</th>
                            <th>Difficulty Level</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                </table>

            </div>
        </div>

        <script>
            $(function () {
                $('#tasks-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('task.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'task_name', name: 'task_name'},
                        {data: 'category', name: 'category'},
                        {data: 'due_date', name: 'due_date'},
                        {data: 'difficulty_level', name: 'difficulty_level'},
                        {data: 'status', name: 'status'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
            });
        </script>
    </section>
@endsection
