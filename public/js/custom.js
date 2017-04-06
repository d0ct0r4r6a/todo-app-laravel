/*=============== MODAL FORM =====================*/

// NEW/EDIT LIST FORM HANDLER

$('body').on('click','.show-todolist-modal', function(event) {
  event.preventDefault();

  var me = $(this),
     url = me.attr('href'),
     title = me.attr('title');
  
  $('#todo-list-title').text(title);
  $('#todo-list-save-btn').text(me.hasClass('edit') ? 'Update' : 'Create');

  $.ajax({
    url: url,
    dataType: 'html',
    success: function(response){
      $('#todo-list-body').html(response);
    }
  });

  $('#todolist-modal').modal('show');
});


/*================= CREATE/UPDATE ==================*/
/**
 * CREATE/UPDATE BUTTON HANDLER
 */
$('#todo-list-save-btn').click(function(event){
  event.preventDefault();
  var form = $('#todo-list-body form'),
      url = form.attr("action"),
      // This is needed because form in collectivelaravel
      // put hidden input named '_method' to simulate 'PUT' request
      method = $('input[name=_method]').val() == undefined ? "POST" : 'PUT';
  
  form.find('.help-block').remove();
  form.find('.form-group').removeClass('has-error');

  $.ajax({
    url: url,
    method: method,
    data: form.serialize(), //TO-UNDERSTAND
    success: function(response){
      if (method === 'POST'){
        $('#todo-list').prepend(response);

        showMessage("To-do list has been created.");

        form.trigger('reset');
        $('#title').focus();

        updateTodoListCounter();
      }
      else {
        //this is the hidden input too
        var id = $('input[name=id]').val();
        if (id) {
          $('#todo-list-' + id).replaceWith(response);
        }
      }
      $('#todolist-modal').modal('hide');
      showMessage("Todo list has been updated.", "#update-alert")

    },
    error: function (xhr) {
      var errors = xhr.responseJSON;
      if($.isEmptyObject(errors) == false) {
        $.each(errors, function(key,value){
          $('#' + key)
              .closest('.form-group')
              .addClass('has-error')
              .append('<span class="help-block"><strong>' + value + '</strong></span>')
        });
      }
    }
  });
});

/*===================DELETE===================== */

/**
 * DELETE MODAL BUTTON HANDLER
 */
$('body').on('click', '.show-confirm-modal', function(event) {
  event.preventDefault();

  var me = $(this),
      title = me.attr('data-title'),
      action = me.attr('href');


  $('#confirm-body form').attr('action', action);
  $('#confirm-body p').html("Do you want to delete the list: <strong>" + title + "</strong>?" ); 
  $('#confirm-modal').modal('show');
});

/**
 * DELETE CONFIRMATION HANDLER
 */
$('body').on('click', '#confirm-remove-btn', function(e){
  e.preventDefault();

  var form = $('#confirm-body form'),
      url = form.attr('action');
  

  $.ajax({
      url: url,
      method: 'DELETE',
      data: form.serialize(),
      success: function(data) {
        $('#confirm-modal').modal('hide');

        $('#todo-list-' + data.id).fadeOut(function() {
           $(this).remove();
           updateTodoListCounter();
           showMessage("Todo list has been deleted.", "#update-alert")
        });
      }
     });
});

/*================== TASKS ===================== */

/**
 * TASK MODAL SHOW BUTTON HANDLER
 */
$('body').on('click', '.show-task-modal', function(event) {
  
  event.preventDefault();

  var me = $(this),
    url = me.attr('href'),
    title = me.data('title'),
    action = me.data('action'),
    parent = me.closest('.list-group-item');

  $("#task-modal-subtitle").text(title);
  $('#task-form').attr('action',action);
  $('#selected-todo-list').val(parent.attr('id'));

  $.ajax({
    url: url,
    dataType: 'html',
    success: function (response) {
      $('#task-table-body').html(response);
      initIcheck(); // to initialize icheck checkboxes
      countActiveTask();
    }
  });

  $('#task-modal').modal('show');

});

/**
 * TASK FORM SUBMISSION HANDLER
 */
$("#task-form").submit(function(e) {
  e.preventDefault();

  var form = $(this),
      url = form.attr('action');

  $.ajax({
    url: url,
    type: 'POST',
    data: form.serialize(),
    success: function (response) {
      $('#task-table-body').prepend(response);
      form.trigger('reset');
      countActiveTask();
      initIcheck();
      countAllTasksofSelectedList();
    }
  });
});

/**
 * TASK REMOVE BUTTON HANDLER
 */

$('#task-table-body').on('click', '.remove-task-btn', function(e) {
  e.preventDefault();

  var url = $(this).attr('href');

  $.ajax({
    url: url,
    type: 'DELETE',
    data: {
      _token: $('input[name=_token]').val()
    },
    success: function(response) {
      $('#task-' + response.id).fadeOut(function() {
        $(this).remove();
        countActiveTask();
        countAllTasksofSelectedList();
      });
    }
  });
});

/**
 * TASK FILTER BUTTON HANDLER
 */
$(".filter-btn").click(function (e) {
  e.preventDefault();
  $(this).addClass('active').parent().children().not(e.target).removeClass('active');

  var id = this.id;

  if (id== "all-tasks"){
    $('tr.task-item').show();
  }
  else if (id== "active-tasks"){
    $('tr.task-item:not(:has(td.done))').show();
    $('tr.task-item:has(td.done)').hide();
  }
  else if (id== "completed-tasks"){
    $('tr.task-item:has(td.done)').show();
    $('tr.task-item:not(:has(td.done))').hide();
  }


});










/*================== HELPER ==================== */

/**
 * UPDATE LIST COUNTER AT THE FOOTER
 */
function updateTodoListCounter() {
  var total = $('.list-group-item').length;
  $('#todo-list-counter').text(total).next().text(total > 1 ? 'lists' : 'list');

  showNoRecordMessage(total);  
}

/**
 * SHOW/REMOVE ALERT MESSAGE
 * 
 * @param total 
 */
function showNoRecordMessage(total) {
  if (total > 0) {
    $('#todo-list').closest('.panel').removeClass('hidden');
    $('#no-record-alert').addClass('hidden');
  }
  else {
    $('#todo-list').closest('.panel').addClass('hidden');
    $('#no-record-alert').removeClass('hidden');
  }
}

/**
 * DISPLAY ALERT
 * 
 * @param {string} message 
 * @param {string} element 
 */
function showMessage(message, element = "#add-new-alert") {
  $(element).text(message).fadeTo(1000,500).slideUp(500, function () {  
    $(this).hide();
  });
}

function countActiveTask() {
  var total = $('tr.task-item:not(:has(td.done))').length;
  $("#active-tasks-counter").text(total + " " + (total > 1 ? 'tasks' : 'task') + ' left');
}

function countAllTasksofSelectedList() {
  var total = $('#task-table-body tr').length,
    selectedTodoListId = $('#selected-todo-list').val();

  $('#' + selectedTodoListId).find('span.badge').text(total + " " + (total > 1 ? 'tasks' : 'task'));
}

function markTheTask(checkbox) {
  url = checkbox.data('url'),
        completed = checkbox.is(':checked');

  $.ajax({
    url: url,
    type: 'PUT',
    data: {
      completed: completed,
      _token: $("input[name=_token]").val()
    },
    success: function(response) {
      if (response) {
        var nextId = checkbox.closest('td').next();

        if (completed) {
          nextId.addClass('done');
        }
        else {
          nextId.removeClass('done');
        }

        countActiveTask();
      }
    }
  });
}



/*==================UTILITIES================== */

/**
 * iCHECK CHECKBOXES
 */
function initIcheck() {
  $('input[type=checkbox]').iCheck({
    checkboxClass: 'icheckbox_square-green',
    increaseArea: '20%'
  });

  $('#check-all').on('ifChecked', function(e){
    $('.check-item').iCheck('check');
  });
  
  $('#check-all').on('ifUnchecked', function(e){
    $('.check-item').iCheck('uncheck');
  });

  $('.check-item')
    .on('ifChecked', function(e){
      var checkbox = $(this);
      markTheTask(checkbox);
    })
    .on('ifUnchecked', function(e){
      var checkbox = $(this);
      markTheTask(checkbox);     
    });
  
}

/**
 * PREVENT ENTER KEY SUBMISSION
 */
$('#todolist-modal').on('keypress', 'input:not(textarea)', function (event){
  return event.keyCode != 13;
});
