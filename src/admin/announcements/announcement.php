<!DOCTYPE html>
<html>
<head>
    <title>Vivixx</title>
    <link type="text/css" rel="stylesheet" href="../../style/style2.css">
    <link type="text/css" rel="stylesheet" href="../style/jquery-ui.min.css">
</head>
<body>
    <form action="announcements/submit_announcement.php" class="text-center" id="container-announcement" method="POST" enctype="multipart/form-data">
		<div class="row form-goup">
			<div class="col">
				<input name="subject" type="text" class="form-control" placeholder="Subject" required>
			</div>
			
			<div class="col">
				<input name="date" type="date" class="form-control" id="date" required min="2018-01-02">
			</div>
		</div>
          
		<div id="border">
			<textarea name="body" id='text' placeholder="Content" required></textarea>
		</div>
		
		<div id="result">
			Remaining characters: <span id="totalChars">1000</span><br/>
		</div>
		<br>
        <div>
        Upload Attachment
        <br>
        <input type="file" name="file">
        </div>
        <div>
        Upload Image
        <br>
        <input type="file" name="image">
        </div>
		<input id="btn" class="btn btn-primary" type="submit" name="submit" value="submit">
        
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
$('#container-announcement').ajaxForm({
    url: 'announcements/submit_announcement.php',
    method: 'post',
    success: function () {
        $("#announcement").modal("show");
    }
});
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
        $('#text').keyup(counter);
    });
    $('#date').datepicker({
        showOtherMonths: true
        // selectOtherMonths: true
    });
    
    
</script>
</html>