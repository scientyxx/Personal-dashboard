<!-- Modal -->
<div class="modal fade" id="viewModal{{ $task->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $task->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel{{ $task->id }}">Task Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tampilkan detail tugas di sini -->
                <div>
                    Task Name: <span id="task_name">{{ $task->task_name }}</span>
                </div>
                <div>
                    Category: <span id="category">{{ $task->category }}</span>
                </div>
                <div>
                    Due Date: <span id="due_date">{{ $task->due_date }}</span>
                </div>
                <div>
                    Difficulty Level: <span id="due_date">{{ $task->difficulty_level }}</span>
                </div>
                <div>
                    Status: <span id="due_date">{{ $task->status }}</span>
                </div>
                <!-- Tambahkan elemen lainnya sesuai kebutuhan -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
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
            modal.find('#difficulty_level').text(response.difficulty_level);
            modal.find('#status').text(response.status);
            // Tambahkan kode untuk menampilkan data lainnya

            modal.modal('show'); // Tampilkan modal
        },
        error: function(error) {
            console.log(error);
        }
    });
});
    </script>
