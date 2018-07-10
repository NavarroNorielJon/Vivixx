<?php
    include '../../utilities/db.php';
    $connect = Connect();
    $user_id = $_GET["user_id"];
    $first_name = $_GET["fname"];
    $middle_name = $_GET["mname"];
    $last_name = $_GET["lname"];
    $sql = "SELECT * FROM user_info NATURAL JOIN user natural join employee_info WHERE user_id='$user_id';";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
?>
<form action="update_user.php" method="POST">
    <div class="modal fade" id="set" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document" style="min-width: 130vh; max-width: 130vh;">
                <div class="modal-content"  style="border-radius: 0;">
                    <div class="modal-header">
                        <h1><?php echo $first_name . " " . $middle_name . " " . $last_name?></h1>
                        <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                    </div>
                    <div class="modal-body">
                        <label>Department</label>
                        <input type="text" name="department" value="">
                        <br>

                        <label>Position</label>
                        <select class="custom-select form-control" name="position">
                            <option selected disabled required="require">Choose Here:</option>
                            <option value="Freelance">Freelance</option>
                            <option value="Project Based">Project Based</option>
                            <option value="Probationary">Probationary</option>
                            <option value="Regular">Regular</option>
                        </select>

                        <label>Employee Status</label>
                        <select class="custom-select form-control" name="employee_status">
                            <option selected disabled required="require">Choose Here:</option>
                            <option value="Freelance">Freelance</option>
                            <option value="Project Based">Project Based</option>
                            <option value="Probationary">Probationary</option>
                            <option value="Regular">Regular</option>
                        </select>
                        
                        <label>Date hired</label><br>
                        <input type="date" name="date">
                        <div style="text-align:right">
                            <input type="submit" class="btn btn-danger" name="reject" value="Cancel">
                            <input type="submit" class="btn btn-success" name="accept" value="Approve">
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#set").modal("show");
    });
</script>