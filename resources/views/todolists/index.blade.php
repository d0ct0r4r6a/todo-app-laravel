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

        <!--MODAL-->
        <div class="modal fade" tabindex="-1" role="dialog" id="todolist-modal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create New List</h4>
              </div>
              <div class="modal-body">

                <form>
                  <div class="form-group">
                    <label for="" class="control-label">List Name</label>
                    <input type="text" class="form-control input-lg">
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label">Description</label>
                    <textarea class="form-control input-lg" name="" id="" rows="2"></textarea>
                  </div>
                </form>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- TASK MODAL-->
        <div class="modal fade" tabindex="-1" role="dialog" id="task-modal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Todo List</h4>
                <p>of <strong>To do List 1</strong></p>
              </div>

              <!-- TASK MODAL BODY -->
              <div class="modal-body">
                <div class="panel panel-default">
                  <table class="table">
                    <thread>
                      <td width="50" style="vertical-align: middle;"><input type="checkbox" name="check-all" id="check-all"></td>
                      <td><input type="text" placeholder="Enter New Task" class="task-input"></td>
                    </thread>
                    <tbody>
                      <tr>
                        <td><input type="checkbox" class="check-item"></td>
                        <td class="task-item">
                          The first task
                          <div class="buttons row-buttons">
                            <a href="" class="btn btn-xs btn-danger">
                              <i class="glyphicon glyphicon-remove"></i>
                            </a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="check-item"></td>
                        <td class="task-item">
                          The second task
                          <div class="buttons row-buttons">
                            <a href="" class="btn btn-xs btn-danger">
                              <i class="glyphicon glyphicon-remove"></i>
                            </a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" class="check-item"></td>
                        <td class="task-item">
                          The third task
                          <div class="buttons row-buttons">
                            <a href="" class="btn btn-xs btn-danger">
                              <i class="glyphicon glyphicon-remove"></i>
                            </a>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                
              </div>

              <div class="modal-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-xs btn-default active">All</a>
                  <a href="#" class="btn btn-xs btn-default">Active</a>
                  <a href="#" class="btn btn-xs btn-default">Completed</a>
                </div>
                <div class="pull-right">
                  <small>3 items left</small>
                </div>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        {{-- TODO LISTS --}}
        <div class="panel panel-default {{ ! $count ? 'hidden' : '' }}">
          <ul class="list-group" id="todo-list"> {{-- id for AJAX to add new to-do list item --}}

          @foreach($todoLists as $todoList)
              
            <li class="list-group-item">
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
            <small>{{ $count }} list item{{ $count > 1 ? 's' : ''}}</small>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection