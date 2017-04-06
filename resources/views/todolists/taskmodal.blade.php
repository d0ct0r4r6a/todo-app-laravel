<div class="modal fade" tabindex="-1" role="dialog" id="task-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Manage tasks</h4>
        <p>of <strong id="task-modal-subtitle"></strong></p>
      </div>

      <!-- TASK MODAL BODY -->
      <div class="modal-body">
        <div class="panel panel-default">
          <table class="table">
            <thread>
              <td width="50" style="vertical-align: middle;">
                <input type="checkbox" name="check-all" id="check-all">
              </td>
              <td>
                <form action="" id="task-form">
                  {{ csrf_field() }}
                  <input type="hidden" id="selected-todo-list">
                  <input type="text" name="title" id="task-title" placeholder="Enter New Task" class="task-input">
                </form>
              </td>
            </thread>
            <tbody id="task-table-body">
              {{-- TASK INSERTED VIA AJAX  --}}
            </tbody>
          </table>
        </div>
        
      </div>

      <div class="modal-footer">
        <div class="pull-left">
          <a href="#" id="all-tasks" class="btn btn-xs btn-default filter-btn active">All</a>
          <a href="#" id="active-tasks" class="btn btn-xs btn-default filter-btn">Active</a>
          <a href="#" id="completed-tasks" class="btn btn-xs btn-default filter-btn">Completed</a>
        </div>
        <div class="pull-right">
          <small id="active-tasks-counter"></small>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>