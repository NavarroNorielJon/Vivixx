<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../style/style.css" />
</head>
<body>
    <form action="submit_announcement.php" method="POST">
            <div id="border">
                    <textarea id='text'></textarea>
                </div>
                <div id="result">
                    remaining characters: <span id="totalChars">1000</span><br/>
            </div>
            <input type="submit" value="submit">
    </form>
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
        $('#text').keyup(counter);
    });
</script>
</html>