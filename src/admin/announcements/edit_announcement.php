<?php
    include '../../utilities/db.php';
    $connect = Connect();
    $announcement_id = $_GET["announcement_id"];
    $edit_announcement = "SELECT * FROM mis.announcement left join mis.announcement_attachments using(announcement_id) where announcement_id='$announcement_id';";
    $result = $connect->query($edit_announcement);
    $row = $result->fetch_assoc();
?>
	<form action="submit_edit_announcement.php" method="POST" enctype="multipart/form-data">
    	<div class="modal fade" id="edit" tabindex="-1" role="dialog" >
        	<div class="modal-dialog" role="document" style="min-width: 130vh; max-width: 130vh;">
            	<div class="modal-content">
                	<div class="modal-header">
						<h1>Edit announcement</h1>
						<input type="hidden" name="announcement_id" value="<?php echo $row["announcement_id"]?>">
                	</div>
                	
					<input type="hidden" name="id" value="<?php echo $announcement_id?>">

                	<div class="modal-body">
                    	<div class="row">
							<div class="form-group col">
								<label for="subject">Subject</label>
								<input type="text" class="form-control" id="subject" name="subject" value="<?php echo $row['subject']?>">
							</div>

							<div class="form-group col">
								<label for="date">Start Date</label>
								<input type="date" class="form-control" id="date" name="start_date" value="<?php echo $row['start_date']?>">
							</div>

							<div class="form-group col">
								<label for="date">End Date</label>
								<input type="date" class="form-control" id="date" name="end_date" value="<?php echo $row['end_date']?>">
							</div>
							
							<?php 
                        	if($row["departments"] === "All"){
                            	$dept= "All Departments";
                        	}else if($row["departments"] === "Administration"){
                            	$dept= "Administration";
                        	}else if($row["departments"] === "Administration Support / HR"){
                            	$dept= "Administration Support / HR";
                        	}else if($row["departments"] === "IT Support"){
                            	$dept= "IT Support";
                        	}else if($row["departments"] === "Non-voice Account"){
                            	$dept= "Non-voice Account";
                        	}else if($row["departments"] === "Phone ESL"){
                            	$dept= "Phone ESL";
                        	}else if($row["departments"] === "Video ESL"){
                            	$dept= "Video ESL";
                        	}else{
                            	$dept= "Virtual Assistant";
                        	}
                    		?>
							
							<div class="form-group col">
								<label for="departments">Department</label>
                            	<select class="custom-select form-group" id="departments" name="department" required>
									<option value="" disabled><?php echo $dept ?></option>
                                	<option value="All">All Departments</option>
                                	<option value="Administration">Administration</option>
                                	<option value="Administration Support / HR">Administration Support / HR</option>
                                	<option value="IT Support">IT Support</option>
                                	<option value="Non-voice Account">Non-voice Account</option>
                                	<option value="Phone ESL">Phone ESL</option>
                                	<option value="Video ESL">Video ESL</option>
                                	<option value="Virtual Assistant">Virtual Assistant</option>
                            	</select>
                        	</div>
						</div>
						
						<div style="text-align:left">
							<div class="d-flex ">
								<div class="p-2" id="border">
									<p contenteditable="true" id="editable"><?php echo $row["announcement"]?></p>
									<textarea hidden class="form-control" name="body" id='text' placeholder="Content" column="5" required></textarea>
									<div class="text-center">
										Remaining characters: <span id="totalChars">1500</span><br/>
									</div>
								</div>                           
							</div>
							
							<span class="btn btn-default btn-file">
								<input type="file" name="file[]" multiple>
							</span>
						</div>
						
						<div style="text-align:right">
							<button type="button"  class="btn btn-danger" data-dismiss="modal">Close</button>
							<input type="submit" class="btn btn-primary" name="edit" value="Edit">
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
    
	<script>
        $(document).ready(function(){
            $("#edit").modal("show");
        });

		//script for content counter
		var counter = function() {
			var value = $('#editable').text();
			var negative = 1500;
			
			if (value.length == 0) {
				$('#totalChars').text(1500);
				return;
			}else if(value.length >= 1500){
				$('#totalChars').text(0);
				return;
			}else{
				var regex = /\s+/gi;
			var totalChars = value.length;
			var remainder = negative - totalChars;
			$('#totalChars').text(remainder);
			}
		};

		$(document).ready(function() {
			var content_id = 'editable';  
			max = 1499;
			//binding keyup/down events on the contenteditable div
			$('#'+content_id).keyup(function(e){ check_charcount(content_id, max, e); });
			$('#'+content_id).keydown(function(e){ check_charcount(content_id, max, e); });

			function check_charcount(content_id, max, e){   
				if(e.which != 8 && $('#'+content_id).text().length > max){
					e.preventDefault();
				}
			}
			$('#text').keyup(counter);
			$('#editable').keyup(function(){
				
				var text = $('#editable').html();
				$('#text').html(text);
				counter();

			});	
		});
    </script>