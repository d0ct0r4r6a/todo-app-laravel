@extends('layouts.main')

@section('title', 'To-do App')
    
@section('content')
  <!-- HEADER -->
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="clearfix">
            <div class="pull-left"><h1 class="header-title">Todo List</h1></div>
            <div class="pull-right">
              <a href="{{ route('todolists.create') }}" class="btn btn-success show-todolist-modal" title="Create New List">Create New List</a>
            </div>
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

        <div class="alert alert-success" id="update-alert" style="display:none;"></div>

        <!-- CREATE/EDIT LIST MODAL-->
        @include('todolists.todolistmodal')

        <!-- TASK MODAL-->
        @include('todolists.taskmodal')

        <!-- CONFIRM MODAL-->
        @include('todolists.confirmmodal')

        {{-- TODO LISTS --}}
        <div class="panel panel-default {{ ! $count ? 'hidden' : '' }}">
          <ul class="list-group" id="todo-list"> {{-- id for jQuery AJAX to add new to-do list item --}}

          @foreach($todoLists as $todoList)
              
            @include('todolists.item', compact('todoList')) 

          @endforeach

          </ul>

          <div class="panel-footer">
            <small>
            <span id="todo-list-counter">{{ $count }}</span>
            <span>list{{ $count > 1 ? 's' : ''}}</span>
            </small>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection