require('./bootstrap');
require('bootstrap-input-spinner/src/bootstrap-input-spinner');


$(document).ready(function(){
    // init the fancy number value input
    $("input[type='number']").inputSpinner()

    // get the tasks for default project


    // add new task
    $('#add-new-task-button').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/task",
            method: 'POST',
            data: {
                title: $('#task-title').val(),
                priority: $('#priority-number').val(),
                project_id: $('#project-select').val()
            },
            success: function(result){
                $('#add-new-task-success-alert').addClass('show');
                // wait a few seconds and remove the alert
                setTimeout(function (){
                    $('#add-new-task-success-alert').removeClass('show')
                }, 2000);;
            }});
    });
});


