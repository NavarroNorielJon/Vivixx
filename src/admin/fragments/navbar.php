<script>
    $(document).ready(function() {
        $('.signup').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('href'),
                success: function(res) {
                    $('#signup_form').html(res);
                }
            });
        });
    });
</script>
<?php
    $new_reg = "SELECT user_id, first_name, middle_name, last_name, department,email FROM user_info NATURAL JOIN user natural join employee_info WHERE type='user' and (date_hired is null and employee_status is null and position is null);";
    $res = $connect->query($new_reg);
    $count = mysqli_num_rows($res);

    if($count > 0){
        $set = $count;
    }else{
        $new ="0";
    }
    

    $leave = "SELECT status from leave_req where status='pending';";
    $res1 = $connect->query($leave);
    $count1 = mysqli_num_rows($res1);

    if($count > 0){
        $leave = $count;
    }else{
        $leave ="0";
    }
?>

<nav class="fixed-top navbar navbar-dark navbar-expand-lg  navigation-bar">
    <a href="../accounts/accounts_status.php" class="navbar-brand">Vivixx</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="#navbar-content" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar-content">
        <ul class="navbar-nav">
            <li>
                <input name='edit' value='signup' style='display: none;'>
                <a href="../fragments/signup.php" data-target="#signup" class="btn btn-primary signup">Add User</a>
            </li>

            <li id="acc" class="nav-item">
                <a class="nav-link" href="../accounts/accounts_status.php">Accounts</a>
            </li>

            <li id="emp" class="nav-item">
                <button onclick="myFunction()" class="dropbtn">Employees</button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="../user_information/user_information.php">Employees</a>
                    <a href="../newly_registered_users/newly_registered.php">New Registered Employees(<span style="color:red;"><?php echo $new?></span>)</a>
                </div>
            </li>

            <li id="leave_r" class="nav-item">
                <a class="nav-link" href="../leave_request/leave_requests.php">Leave Request(<span style="color:red;"><?php echo $leave?></span>)</a>
            </li>

            <li id="sum" class="nav-item">
                <a class="nav-link" href="../summary_of_pay/user_summary.php">Summary of Pay</a>
            </li>

            <li id="pay" class="nav-item">
                <a class="nav-link" href="../payslip/user_payslip.php">Payslip</a>
            </li>

            <li id="an" class="nav-item">
                <a class="nav-link" href="../announcements/announcement.php">Announcement</a>
            </li>

            <li class="nav-item">
                <a class="nav-link logout" href="../utilities/logout.php">Logout</a>
            </li>

        </ul>
    </div>
</nav>
<div id="signup_form"></div>
