@extends('layouts.main')

@section('title', 'To-do App')
    
@section('content')
  <!-- HEADER -->
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="clearfix">
            <div class="pull-left"><h1 class="header-title">Todo List Yo</h1></div>
            <div class="pull-right"><button class="btn btn-success" data-toggle="modal" data-target="#todolist-modal">Create New List</button></div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- MAIN CONTENT -->
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        {{-- ALERT --}}
        <div class="alert alert-warning {{ $count ? 'hidden' : '' }}" id="no-record-alert">
          No record found.
        </div>

        <!-- CREATE/EDIT LIST MODAL-->
        @include('todolists.todolistmodal')

        <!-- TASK MODAL-->
        @include('todolists.taskmodal')

        {{-- TODO LISTS --}}
        <div class="panel panel-default {{ ! $count ? 'hidden' : '' }}">
          <ul class="list-group" id="todo-list"> {{-- id for jQuery AJAX to add new to-do list item --}}

          @foreach($todoLists as $todoList)
              
            <li class="list-group-item" id="todo-list-{{ $todoList->id }}"> {{-- id for jQuery to delete this item --}}
              <h4 class="list-group-item-heading">{{ $todoList->title }} <span class="badge">0 task</span></h4>
              <p class="list-group-item-text">{{ $todoList->description }}</p>
              <div class="buttons">
                <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#task-modal" title="Manage Tasks"><i class="glyphicon glyphicon-ok"></i></a>
                <a href="#" class="btn btn-default btn-xs" data-toggle="modal" data-target="#todolist-modal" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="#" class="btn btn-danger btn-xs" title="Delete"><i class="glyphicon glyphicon-remove"></i></a>
              </div>
            </li>

          @endforeach

          </ul>

          <div class="panel-footer">
            <small><span id="todo-list-counter">{{ $count }}</span> list{{ $count > 1 ? 's' : ''}}</small>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection