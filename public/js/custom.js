$('.show-todolist-modal').click(function(event) {
  event.preventDefault();

  var url = $(this).attr('href');
  
  $.ajax({
    url: url,
    dataType: 'html',
    success: function(response){
      $('#todo-list-body').html(response);
    }

  });

  $('#todolist-modal').modal('show');
});

// AJAX for handling list saving

$('#todo-list-save-btn').click(function(event){
  event.preventDefault();
  var form = $('#todo-list-body form'),
      url = form.attr("action"),
      method = "POST";
  
  form.find('.help-block').remove();
  form.find('.form-group').removeClass('has-error');

  $.ajax({
    url: url,
    method: method,
    data: form.serialize(), //TO-UNDERSTAND
    success: function(response){
      $('#todo-list').prepend(response);
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