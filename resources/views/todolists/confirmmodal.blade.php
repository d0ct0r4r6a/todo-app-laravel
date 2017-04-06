<div class="modal fade" tabindex="-1" role="dialog" id="confirm-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="confirm-title">Confirm deletion</h4>
      </div>
      <div class="modal-body" id="confirm-body">    
        <form action="" method="POST">
          {{ csrf_field() }}
        </form>
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger" id="confirm-remove-btn">Yes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>