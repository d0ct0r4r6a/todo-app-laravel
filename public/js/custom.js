// TO DO LIST MODAL 

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

function showMessage(message, element = "#add-new-alert") {
  $(element).text(message).fadeTo(1000,500).slideUp(500, function () {  
    $(this).hide();
  });
}

function updateTodoListCounter() {
  var total = $('.list-group-item').length;
  $('#todo-list-counter').text(total).next().text(total > 1 ? 'lists' : 'list');
}

//TODO: Prevent Enter key to submit in new todolist form
$('#todo-list-modal').on('keypress', 'input:not(textarea)', function (event){
  return event.keyCode != 13;
});


// AJAX for handling list saving

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
        $('#todo-list').prepend(response); //BUG: IF NO #todo-list ? i.e. no lists have been created

        showMessage("To-do list has been created.");

        form.trigger('reset');
        $('#title').focus();

        updateTodoListCounter();
      }
      else {
        //this is the hidden input too
        var id = $('input[name=id]').val();
        console.log(id);
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

$('.show-task-modal').click(function(event) {
  event.preventDefault();

  $('#task-modal').modal('show');
});

$(function() {
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

});