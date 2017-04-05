<div class="alert alert-success" id="add-new-alert" style="display: none;"></div>

{!! Form::model($todoList, ['route' => 'todolists.store']) !!}
  <div class="form-group">
    <label for="" class="control-label">List Name</label>
    {!! Form::text('title', null, ['class'=>'form-control input-lg', 'id'=>'title']) !!}
  </div>
  <div class="form-group">
    <label for="" class="control-label">Description</label>
    {!! Form::textarea('description', null, ['class'=>'form-control', 'id'=>'description']) !!}
  </div>
{!! Form::close() !!}