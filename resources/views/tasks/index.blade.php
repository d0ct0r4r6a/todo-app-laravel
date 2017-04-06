@foreach($tasks as $task)
    
  @include('tasks.item',compact('task'))

@endforeach