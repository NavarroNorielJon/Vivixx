$('#update_form').ajaxForm({
    url: '../utilities/update_info',
    method: 'post',
    error: function (){
        swal({
            type: 'error',
            icon: 'warning',
            title: 'Error!',
            text: "Something is wrong",
            showConfirmButton: true,
            timer: 2500
        });
    },
    success: function () {
        swal({
            type: 'success',
            title: 'Success!',
            icon: 'success',
            text: "Thank you!",
            timer: 2500
        }).then(function(){
            window.location ='/';
        });
    }
});



$('#leave_form').ajaxForm({
    url: '../utilities/leave_request.php',
    method: 'post',
    error: function (){
        swal({
            type: 'error',
            title: 'Error!',
            text: "Invalid input",
            showConfirmButton: true,
            icon:'error',
            timer: 2500
        });
    },
    success: function () {
        swal({
            type: 'success',
            title: 'Done',
            text: "Wait for the admin to confirm.",
            icon: 'success',
            showConfirmButton: true,
        }).then(function(){
            window.location = '/pages/leave_request_form';
        });

    }
});
