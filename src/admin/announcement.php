<!DOCTYPE html>
<html>
<head>
    <title>Vivixx</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../style/style2.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <form action="submit_announcement.php" class="text-center" id="container-announcement" method="POST">
		<div class="row form-goup">
			<div class="col">
				<input name="subject" type="text" class="form-control" placeholder="Subject" required>
			</div>
			
			<div class="col">
				<input name="date" type="date" class="form-control" required min="2018-01-02">
			</div>
		</div>
          
		<div id="border">
			<textarea name="body" id='text' placeholder="Content" required></textarea>
		</div>
		
		<div id="result">
			remaining characters: <span id="totalChars">1000</span><br/>
		</div>
		<br>
		<input id="btn" class="btn btn-primary" type="submit" value="submit">
	</form>

    <div id="result">
    </div>

    <div class="modal fade" id="announcement" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document" style="min-width: 130vh; max-width: 130vh;">
            <div class="modal-content" id="message">
                <?php
                    echo "Announcement successfully sent and will be announced on the specified date.";
                ?>
                <div id="ok">
                <br>
                    <a href="index.php" class="btn btn-primary" style="width:25%;">Ok</a>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    counter = function() {
        var value = $('#text').val();
            var negative = 1000;
        if (value.length == 0) {
            $('#totalChars').html(1000);
            return;
        }
        var regex = /\s+/gi;
        var totalChars = value.length;
            var remainder = negative - totalChars;
        $('#totalChars').html(remainder);

    };
    $(document).ready(function() {
        $("#btn").click(function(){
            $("#announcement").modal("show");
        });
        $('#text').keyup(counter);
    });
    
    
</script>
</html>