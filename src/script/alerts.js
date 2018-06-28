$('#update_form').ajaxForm({
    url: '../utilities/update_info.php',
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
$.validator.methods.email = function( value, element ) {
   return this.optional( element ) || /[a-zA-Z0-9]+@[a-z]+\.[a-z]{2,}/.test( value );
}
$( "#signup_form" ).validate({
    rules: {
        email: {
            email: true
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
