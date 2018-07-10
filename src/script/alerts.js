$('#update_form').ajaxForm({
    url: '../utilities/update_info.php',
    method: 'post',

    success: function () {
        swal({
            type: 'success',
            title: 'Success!',
            icon: 'success',
            text: "Thank you!",
            timer: 2500
        }).then(function(){
            window.location ='/pages/home';
        });
    }
});
$.validator.methods.email = function( value, element ) {
   return this.optional( element ) || /[a-zA-Z0-9]+@[a-z]+\.[a-z]{2,}/.test( value );
};
jQuery.validator.addMethod("existing_email", function(value, element) {
    let status;
    $.ajax({
        url: '../utilities/validator.php?email=' + value,
        success: function (data) {
            if (data ==='0') {
                status = true;
            }else {
                status = false;
            }
        },
        async: false
    });
    return status;
}, "Email already exists, Please use another email.");
$( "#signup_form" ).validate({
    rules: {
        email: {
            email: true,
            existing_email: true,
        },
        password: {
            required: true,
            minlength: 8,
        },
        confirm_password: {
            equalTo: "#regpass"
        }
    }
});
$('#signup_form').ajaxForm({
    url: '../utilities/registration.php',
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
    success: function (data) {
        console.log(data);
        swal({
            type: 'success',
            title: 'Successfully Registered',
            text: "Your username is " + data,
            icon: 'success',
            showConfirmButton: true,
        }).then(function(){
            window.location = '/';
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
$('#login').ajaxForm({
    url: '../utilities/login.php',
    method: 'post',
    success: function (data) {
        if (data === 'Invalid Password' || data === 'Your account is disabled' || data === 'User does not exist'
            || data === 'Invalid Username or password'){
            swal({
                title: data,
                icon:'error',
                timer: 2500
            });
        } else {
            console.log(data);
            window.location = data;
        }
    }
});
$('#reset_form').ajaxForm({
    url: '../mailing/send_reset.php',
    method: 'post',
    success: function (data){
        if (data === 'That email is not being used by any account.') {
            swal({
                title: data,
                icon: 'error',
            });
        } else if (data === 'Email sucessfully sent, please check your email.') {
            swal({
                title: data,
                icon: 'success'
            }).then(function () {
                window.location = '/';
            });
        }
    }
});
$( "#reset_pass" ).validate({
    rules: {
        password: {
            required: true,
            minlength: 8,
        },
        confirm_password: {
            equalTo: "#new_pass"
        }
    }
});
$('#reset_pass').ajaxForm({
    url: '../utilities/validate_reset_password.php',
    method: 'post',
    success: function (data){
        if (data === 'You have successfully changed your password.') {
            swal({
                title: data,
                icon: 'success'
            }).then(function () {
                window.location = '/';
            });
        } else if (data === 'Error in resetting your password, this link might be already expired.') {
            swal({
                title: data,
                icon: 'error'
            }).then(function () {
                window.location = '/';
            });
        }
    }
});
$('#status').ajaxForm({
    url: '../admin/leave_request/accept_or_reject.php',
    method: 'post',
    success: function (data){
        if (data === 'User has no more remaining leave credits') {
            swal({
                title: data,
                icon: 'error',
            });
        } else if (data === 'Error in updating status') {
            swal({
                title: data,
                icon: 'error'
            }).then(function () {
                window.location = '/';
            });
        }
    }
});
$('#accept_reject').ajaxForm({
    url: '../mailing/accept_or_reject.php',
    method: 'post',
    success: function (data){
        if (data === 'Email sucessfully sent.') {
            swal({
                title: data,
                icon: 'success',
            });
        } else if (data === 'That email is not being used by any account.') {
            swal({
                title: data,
                icon: 'success'
            }).then(function () {
                window.location = '/';
            });
        }
    }
});
