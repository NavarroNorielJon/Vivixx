<script src="../../script/jquery.min.js"></script>
<form id="status" action="../../mailing/accept_or_reject.php" method="post">
    <input type="hidden" id="stat" name="status" value="<?php echo $_POST['status']; ?>">
    <input type="hidden" id="email" name="email" value="<?php echo $_POST['email']; ?>">
</form>

<script>
    $("#status").submit();
    $('#accept_reject').ajaxForm({
        url: 'accept_or_reject.php',
        method: 'post',
        dataType: 'html',
        success: function (data) {
            swal({
                type: 'error',
                title: data,
                icon: 'error',
                showConfirmButton: true,
            }).then(function(){
                window.location = '../leave_request/leave_requests';
            });
        }
    });
</script>
