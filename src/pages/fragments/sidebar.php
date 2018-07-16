<script>
    $(document).ready(function() {
        $('.salary').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('href'),
                success: function(res) {
                    $('#salary_form').html(res);
                }
            });
        });
    });
</script>
<nav class="sidebar">
    <div class="sidebar-header">
        <a class="sidebar-logo" href="home"><img src="../img/Lion.png"></a>
    </div>

    <!-- Sidebar Links -->
    <ul class="list-unstyled components">
        <li>
            <a href="profile.php" class="sidebar-item">
                <i class="material-icons">person</i>
                <?php echo "$first_name"?></a>
            <a href="profile.php" class="icon">
                <i class="material-icons">person</i>
            </a>
        </li>

        <li>
            <a href="home.php" class="sidebar-item">
                <i class="material-icons">home</i>Home</a>
            <a class="icon" href="home.php">
                <i class="material-icons">home</i>
            </a>
        </li>

        <li>
            <a href="notification.php" class="sidebar-item">
                <i class="material-icons">mail</i>Notifications</a>
            <a class="icon" href="notification.php">
                <i class="material-icons">mail</i>
            </a>
        </li>

        <li class="active">
            <a href="#requests" data-toggle="collapse" class="sidebar-item" aria-expanded="false">
                <i class="material-icons">work</i>
                Requests</a>
            <a href="#requests" data-toggle="collapse" class="icon" aria-expanded="false">
                <i class="material-icons">work</i>
            </a>
            <ul class="collapse list-unstyled" id="requests">
                <li class="active">
                    <input name='edit' value='salary' style='display: none;'>
                    <a href="fragments/salary_request.php" data-target="#salary" class="sidebar-item salary">Salary Request</a>
                </li>
                <li class="active">
                    <a href="leave_request_form" class="sidebar-item">Leave Request</a>
                </li>

                <li class="active">
                    <a href="#requests" class="icon">SR</a>
                </li>
                <li class="active">
                    <a href="leave_request_form" class="icon">LR</a>
                </li>
            </ul>
        </li>
        <hr>
        <li>
            <a href="../utilities/logout.php" class="sidebar-item logout">
                <i class="material-icons">power_settings_new</i>
                Logout
            </a>
            <a class="icon" href="../utilities/logout.php">
                <i class="material-icons">power_settings_new</i>
            </a>
        </li>
    </ul>
</nav>
