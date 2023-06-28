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
                            <a href="{{ route('create_task') }}" class="btn btn-success" role="button">Add Project</a>
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

        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true" data-id="">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="sample_form" method="POST" style="display: inline-block;">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Edit Record</h5>
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
                                    <input type="date" id="due_date" name="due_date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="difficulty_level">Difficulty Level</label>
                                    <input type="text" id="difficulty_level" name="difficulty_level" class="form-control" placeholder="Difficulty Level">
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



            $('.btn-info').on('click', function() {
                var taskId = $(this).data('task-id');

                $.ajax({
                    url: '/tasks/edit/' + taskId,
                    type: 'GET',
                    success: function(response) {
                        var task = response.result;

                        $('#task_name').val(task.task_name);
                        $('#difficulty_level').val(task.difficulty_level);
                        $('#due_date').val(task.due_date);
                        $('#category').val(task.category);
                        $('#status').val(task.status);

                        $('#sample_form').attr('action', '/tasks/' + taskId);
                        $('#sample_form').attr('method', 'POST');
                        $('#action').val('Edit');

                        $('#editModal').modal('show');
                    },
                    error: function(error) {
                        alert(error);
                    }
                });
            });

            $('.btn-primary').on('click', function() {
    var taskId = $(this).closest('form').data('task-id');

    $.ajax({
        url: '/tasks/' + taskId,
        type: 'GET',
        success: function(response) {
            var modal = $('#viewModal' + taskId);

            modal.find('#task_name').text(response.task_name);
            modal.find('#category').text(response.category);
            modal.find('#due_date').text(response.due_date);
            // Tambahkan kode untuk menampilkan data lainnya

            modal.modal('show'); // Tampilkan modal
        },
        error: function(error) {
            console.log(error);
        }
    });
});


        </script>


    </section>
@endsection
