require('./bootstrap');
require('bootstrap-input-spinner/src/bootstrap-input-spinner');

$("input[type='number']").inputSpinner()

function getProjects () {
    $.ajax({
        type:'GET',
        url:'/project',
        success:function(data) {
            $("#msg").html(data.msg);
        }
    });
}
