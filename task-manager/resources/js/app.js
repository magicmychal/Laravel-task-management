require('./bootstrap');
require('bootstrap-input-spinner/src/bootstrap-input-spinner');

import Sortable from "sortablejs";

$(document).ready(function () {
    // init the fancy number value input
    $("input[type='number']").inputSpinner();
    // get the tasks for default project
    $.ajax({
        url: "/task/byProject/" + $('#project-select-for-view').val(),
        contentType: "application/json",
        dataType: 'json',
        success: function (result) {
            modifyTasksHTML(result)
        }
    });


    // make the list sortable
    const taskList = document.getElementById('task-list');
    Sortable.create(taskList);

    // display task blueprint
    function modifyTasksHTML(tasks) {
        $.each(tasks.tasks, function (i, val) {
            console.log('task', val);
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
});


