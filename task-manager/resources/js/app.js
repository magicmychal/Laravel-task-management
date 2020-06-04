require('./bootstrap');
require('bootstrap-input-spinner/src/bootstrap-input-spinner');

import Sortable from "sortablejs";

$(document).ready(function () {
    // init the fancy number value input
    $("input[type='number']").inputSpinner();
    // get the tasks for default project
    getTasksByProject($('#project-select-for-view').val())


    // make the list sortable
    const taskList = document.getElementById('task-list');
    Sortable.create(taskList);

    // add new task
    $('#add-new-task-button').click(function (e) {
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
            success: function (result) {
                $('#add-new-task-success-alert').addClass('show');
                // wait a few seconds and remove the alert
                setTimeout(function () {
                    $('#add-new-task-success-alert').removeClass('show')
                }, 2000);

            }
        });
    });


    // add new project
    $('#add-new-project-button').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/project",
            method: 'POST',
            data: {
                projectName: $('#new-project-name').val(),
            },
            success: function (result) {
                console.log('results', result)
                $('#add-new-project-success-alert').addClass('show');
                // wait a few seconds and remove the alert
                setTimeout(function () {
                    $('#add-new-project-success-alert').removeClass('show')
                }, 2000);

            }
        });
    });

    // select poject to display
    $("#project-select-for-view").change(function(){
       console.log('val', $(this).val())
        getTasksByProject($(this).val())
    });

});

// get tasks
function getTasksByProject(projectId){
    $.ajax({
        url: "/task/byProject/" + projectId,
        contentType: "application/json",
        dataType: 'json',
        success: function (result) {
            modifyTasksHTML(result)
        }
    });
}
// display task blueprint
function modifyTasksHTML(tasks) {
    // remove tasks view first
    $('#task-list').empty()

    if (tasks.tasks.length == 0){
        let html = `<div class="alert alert-info" role="alert">
                      No tasks in this project! Is it good or bad?
                    </div>`
        $('ul#task-list').prepend(html)
    } else {
        $.each(tasks.tasks, function (i, val) {
            let html = `<li class="list-group-item d-flex justify-content-between align-items-center">
                            ${val.title}
                            <div>
                            <span class="badge badge-pill badge-light">Edit</span>
                            <span class="badge badge-pill badge-light">Delete</span>
                            </div>
                        </li>`;
            $('ul#task-list').prepend(html)
        })
    }
}

function refreshProjectsList() {

}

