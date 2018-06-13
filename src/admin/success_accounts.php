<html>
<head>
<?php
    include 'include.php';
?>
</head>
<body>
<div class="modal fade" id="2nd" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document" style="min-width: 130vh; max-width: 130vh;">
        <div class="modal-content">
            <div class="modal-header">
                <?php
                    $sql = "select status from user where usernam;";
                    $result = $connect->query($sql);
                    if($result === "enabled"){
                    echo "Account Succefully Enabled";
                    }else{
                        echo "a;lsdkf;ld";
                    }
                ?>
            </div>
            <a href="accounts_status.php" class="btn btn-primary">Ok</a>
        </div>
    </div>
</div>
</body>
<script>
        $(document).ready(function(){
            $("#2nd").modal("show");
        });
    </script>
</html>