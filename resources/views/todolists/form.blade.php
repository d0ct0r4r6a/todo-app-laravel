<div class="alert alert-success" id="add-new-alert" style="display: none;" ></div>

{!! Form::model($todoList, [
  'route' => $todoList->exists ? ['todolists.update', $todoList->id] : 'todolists.store',
  'method' => $todoList->exists ? 'PUT' : 'POST'
  ]) !!}
  <div class="form-group">
    <label for="" class="control-label">List Name</label>
    {!! Form::text('title', null, ['class'=>'form-control input-lg', 'id'=>'title']) !!}
    {!! Form::hidden('id') !!}
  </div>
  <div class="form-group">
    <label for="" class="control-label">Description</label>
    {!! Form::textarea('description', null, ['class'=>'form-control', 'id'=>'description']) !!}
  </div>
{!! Form::close() !!}