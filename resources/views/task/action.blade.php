<a class="btn btn-primary btn-sm" href="#">
    <i class="fas fa-folder"></i> View
</a>

@include('task.edit-modal', ['task' => $task])

<form action="'.route('tasks.destroy', ['id' => $task->id]).'" method="POST" style="display: inline-block;" >
    '.csrf_field().'
    '.method_field('DELETE').'
    <button type="submit" class="btn btn-danger btn-sm">
        <i class="fas fa-trash"></i> Delete
    </button>
</form>



