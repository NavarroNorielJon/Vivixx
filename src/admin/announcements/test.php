<!DOCtype html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="../../style/bootstrap/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="../style/datatables.css">
<script type="text/javascript" src="../../script/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../script/jquery-ui.min.js"></script>
<script type="text/javascript" src="../../script/datatables.min.js"></script>
<script type="text/javascript" src="../../script/ajax.js"></script>
<script type="text/javascript" src="../../script/popper.min.js"></script>
<script type="text/javascript" src="../../script/sweetalert.min.js"></script>
<script type="text/javascript" src="../../script/bootstrap/bootstrap.min.js"></script>
<script src="../../script/jquery.form.min.js"></script>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
<script src="https://unpkg.com/maxlength-contenteditable@1.0.0/dist/maxlength-contenteditable.js"></script>
    
    <body>
    <h3>Range</h3>

        <label>Start date</label>
        <div class="ui calendar" id="rangestart">
          <div class="ui input left icon">
            <i class="calendar icon"></i>
            <input type="text" placeholder="Start">
          </div>
        </div>
      </div>
      <div class="field">
        <label>End date</label>
        <div class="ui calendar" id="rangeend">
          <div class="ui input left icon">
            <i class="calendar icon"></i>
            <input type="text" placeholder="End">
          </div>
        </div>
</body>

<script>
    $('#rangestart').calendar({
		type: 'date',
		endCalendar: $('#rangeend')
		});

		$('#rangeend').calendar({
		type: 'date',
		startCalendar: $('#rangestart')
		});
</script>
</html>