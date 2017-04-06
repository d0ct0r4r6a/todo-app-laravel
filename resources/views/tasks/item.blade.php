<tr class="task-item" id ='task-{{ $task->id }}'> {{-- id for jQuery to delete this item --}}

  <td>
    <input type="checkbox" data-url="{{ route('todolists.tasks.update', [$task->todoList->id, $task->id])}}" class="check-item" {{ is_null($task->completed_at) ?: 'checked'}}>
  </td>

  <td class="task-item-title {{ is_null($task->completed_at) ?: 'done' }}">
    {{ $task->title }}
    <div class="buttons row-buttons">
      <a href="{{ route('todolists.tasks.destroy', [$task->todoList->id, $task->id]) }}" class="btn btn-xs btn-danger remove-task-btn">
        <i class="glyphicon glyphicon-remove"></i> 
      </a>
    </div>
  </td>

</tr>