// Mendengarkan klik tombol Edit
$('.edit-btn').on('click', function() {
    var taskId = $(this).data('task-id'); // Mengambil ID task dari atribut data pada tombol Edit

    // Mengirim permintaan Ajax untuk mendapatkan data task
    $.ajax({
        url: '/tasks/edit/' + taskId,
        type: 'GET',
        success: function(response) {
            var task = response.result; // Mendapatkan data task dari respons Ajax

            // Mengisi nilai form dengan data task yang ingin diedit
            $('#task_name').val(task.task_name);
            $('#difficulty_level').val(task.difficulty_level);
            $('#due_date').val(task.due_date);
            $('#category').val(task.category);
            $('#status').val(task.status);

            // Mengatur URL dan method form untuk update
            $('#sample_form').attr('action', '/tasks/' + taskId);
            $('#sample_form').attr('method', 'POST');
            $('#action').val('Edit');

            // Menampilkan modal edit
            $('#editModal').modal('show');
        },
        error: function(error) {
            console.log(error);
        }
    });
});
