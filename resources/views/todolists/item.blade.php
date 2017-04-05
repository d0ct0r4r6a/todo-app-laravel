<li class="list-group-item" id="todo-list-{{ $todoList->id }}"> {{-- id for jQuery to delete this item --}}
  <h4 class="list-group-item-heading">{{ $todoList->title }} <span class="badge">0 task</span></h4>
  <p class="list-group-item-text">{{ $todoList->description }}</p>
  <div class="buttons">
    <a href="#" class="btn btn-info btn-xs show-task-modal" title="Manage Tasks"><i class="glyphicon glyphicon-ok"></i></a>
    <a href="#" class="btn btn-default btn-xs show-todolist-modal" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
    <a href="#" class="btn btn-danger btn-xs" title="Delete"><i class="glyphicon glyphicon-remove"></i></a>
  </div>
</li>