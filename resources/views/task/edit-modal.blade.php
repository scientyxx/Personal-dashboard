
<!-- Modal -->
<div class="modal fade" id="editModal{{ $task->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $task->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('tasks.update', ['id' => $task->id]) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel{{ $task->id }}">Edit Record</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <div id="form_result"></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="task_name">Task Name</label>
                            <input type="text" id="task_name" name="task_name" class="form-control" placeholder="Task Name" value="{{ $task->task_name }}">
                        </div>


                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category" class="form-control">
                            <option value="">----</option>
                            <option value="Kuliah" {{ $task->category== 'Kuliah' ? 'selected' : '' }}>Kuliah</option>
                            <option value="Kerja" {{ $task->category== 'Kerja' ? 'selected' : '' }}>Kerja</option>
                        </select>
                    </div>

                        <div class="form-group">
                            <label for="due_date">Due Date</label>
                            <input type="date" id="due_date" name="due_date" class="form-control" placeholder="Due Date" value="{{ $task->due_date }}">
                        </div>
                        <div class="form-group">
                            <label for="difficulty_level">Difficulty Level</label>
                            <select id="difficulty_level" name="difficulty_level" class="form-control">
                                <option value="">----</option>
                                <option value="Hard" {{ $task->difficulty_level == 'Hard' ? 'selected' : '' }}>Hard</option>
                                <option value="Medium" {{ $task->difficulty_level == 'Medium' ? 'selected' : '' }}>Medium</option>
                                <option value="Easy" {{ $task->difficulty_level == 'Easy' ? 'selected' : '' }}>Easy</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="">----</option>
                                <option value="Urgent" {{ $task->status == 'Urgent' ? 'selected' : '' }}>Urgent</option>
                                <option value="Tidak_urgent" {{ $task->status == 'Tidak_urgent' ? 'selected' : '' }}>Tidak Urgent</option>
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
    $(document).ready(function() {
        // Mendengarkan peristiwa submit formulir
        $('#editModal{{ $task->id }} form').submit(function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir secara normal

            var formData = $(this).serialize(); // Mengambil data formulir

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Proses respons sukses
                    // ...
                },
                error: function(error) {
                    // Proses respons error
                    // ...
                }
            });
        });
    });


</script>
