<?php
    include '../../utilities/db.php';
    $connect = Connect();
    $announcement_id = $_GET["announcement_id"];
    $edit_leave = "SELECT * FROM mis.announcement natural join announcement_attachments where announcement_id='$announcement_id'";
    $result = $connect->query($edit_leave);
    $row = $result->fetch_assoc();
?>
	<form action="submit_announcement.php" method="POST">
    	<div class="modal fade" id="edit" tabindex="-1" role="dialog" >
        	<div class="modal-dialog" role="document" style="min-width: 130vh; max-width: 130vh;">
            	<div class="modal-content">
                	<div class="modal-header">
                    	<h1>Edit announcement</h1>
                	</div>
                	
					<input type="hidden" name="id" value="<?php echo $announcement_id?>">

                	<div class="modal-body">
                    	<div class="row">
							<div class="form-group col">
								<label for="subject">Subject</label>
								<input type="text" class="form-control" id="subject" name="subject" value="<?php echo $row["subject"]?>">
							</div>

							<div class="form-group col">
								<label for="date">Date</label>
								<input type="date" class="form-control" id="date" name="date" value="<?php echo $row['date']?>">
							</div>
							
							<?php 
                        	if($row["departments"] === "all"){
                            	$dept= "All Departments";
                        	}else if($row["departments"] === "admin"){
                            	$dept= "Administration";
                        	}else if($row["departments"] === "admin supp"){
                            	$dept= "Administration Support / HR";
                        	}else if($row["departments"] === "it support"){
                            	$dept= "IT Support";
                        	}else if($row["departments"] === "non voice account"){
                            	$dept= "Non-voice Account";
                        	}else if($row["departments"] === "phone esl"){
                            	$dept= "Phone ESL";
                        	}else if($row["departments"] === "video esl"){
                            	$dept= "Video ESL";
                        	}else{
                            	$dept= "Virtual Assistant";
                        	}
                    		?>
							
							<div class="form-group col">
								<label for="departments">Department</label>
                            	<select class="custom-select form-group" id="departments" name="dept" required>
                                	<option value="all">All Departments</option>
                                	<option value="admin">Administration</option>
                                	<option value="admin supp">Administration Support / HR</option>
                                	<option value="it support">IT Support</option>
                                	<option value="non voice account">Non-voice Account</option>
                                	<option value="phone esl">Phone ESL</option>
                                	<option value="video esl">Video ESL</option>
                                	<option value="virtual assistant">Virtual Assistant</option>
                            	</select>
                        	</div>
						</div>

                    	
                    	
						<div class="row">
                        	<div class="form-group col text-center">
                            	<label for="content">Content</label>
                            	<div id="border">
                                	<textarea class="form-control" name="body" id='text' style="margin: auto;" required 	maxlength="1000"></textarea>
                                	Remaining characters: <span id="totalChars">1000</span><br/>
                            	</div>
                        	</div>
						</div>
						
						<div style="text-align:right">
							<input type="submit" class="btn btn-success" name="submit" value="Approve">
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
    </script>