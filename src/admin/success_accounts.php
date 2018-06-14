<html>
<head>
<?php
    include 'include.php';
    
?>
</head>
<body>
<div class="modal fade" id="success" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document" style="min-width: 130vh; max-width: 130vh;">
        <div class="modal-content" id="message">
                <?php
                    echo "a;lsdkf;ld";
                ?>
                <a href="accounts_status.php" class="btn btn-primary" id="ok">Ok</a>

        </div>
    </div>
</div>
</body>
<script>
        $(document).ready(function(){
            $("#success").modal("show");
        });
    </script>
</html>