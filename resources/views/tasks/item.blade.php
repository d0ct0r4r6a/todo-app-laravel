<tr id ='task-{{ $task->id }}'> {{-- id for jQuery to delete this item --}}
  <td><input type="checkbox" class="check-item"></td>
  <td class="task-item">
    {{ $task->title }}
    <div class="buttons row-buttons">
      <a href="" class="btn btn-xs btn-danger">
        <i class="glyphicon glyphicon-remove"></i>
      </a>
    </div>
  </td>
</tr>