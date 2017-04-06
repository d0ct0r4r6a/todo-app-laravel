<?php
  $taskCount = $todoList->tasks->count()
?>

<li class="list-group-item" id="todo-list-{{ $todoList->id }}"> {{-- id for jQuery to delete this item --}}
  <h4 class="list-group-item-heading">{{ $todoList->title }} <span class="badge">{{ $taskCount }} task{{ $taskCount > 1 ? 's' : ''}}</span></h4>
  <p class="list-group-item-text">{{ $todoList->description }}</p>
  <div class="buttons">

    <a href="{{ route('todolists.show', $todoList->id) }}" class="btn btn-info btn-xs show-task-modal" data-title="{{ $todoList->title }}" data-action="{{ route('todolists.tasks.store', $todoList->id) }}" title="Manage Tasks">
      <i class="glyphicon glyphicon-ok"></i>
    </a>

    <a href="{{ route('todolists.edit', $todoList->id) }}" class="btn btn-default btn-xs show-todolist-modal edit" title="Edit {{ $todoList->title }}">
      <i class="glyphicon glyphicon-edit"></i>
    </a>
      
    <a href="{{ route('todolists.destroy', $todoList->id) }}" class="btn btn-danger btn-xs show-confirm-modal" data-title="{{ $todoList->title }}" title="Delete">
      <i class="glyphicon glyphicon-remove"></i>
    </a>

  </div>
</li>