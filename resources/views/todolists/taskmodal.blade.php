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
</div>