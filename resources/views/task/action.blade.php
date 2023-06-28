<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal{{ $task->id }}">
    <i class="fas fa-folder"></i> View

</button>
@include('task.view-modal')



<form action="{{ route('tasks.update', ['id' => $task->id]) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('PUT')
    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $task->id }}">
        <i class="fas fa-edit"></i> Edit
    </button>

    @include('task.edit-modal', ['task' => $task])
</form>



<form action="{{ route('tasks.destroy', ['id' => $task->id]) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">
        <i class="fas fa-trash"></i> Delete
    </button>
</form>
