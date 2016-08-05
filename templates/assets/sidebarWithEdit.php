     <div class="col-md-4">
		<div class="sidebar">
			<div class="block">
				<h3>Classes</h3>
				<hr>
				<div class="row">
					<label class="col-xs-2 col-form-label">
						Term: 
					</label>
					<div class="col-xs-10">
						<select id="term" class="form-control" onchange="selectTerm(this.value)">
							<option>Select Term</option>
							<option>Early Fall</option>
							<option>Late Fall</option>
							<option>Early Spring</option>
							<option>Late Spring</option>
							<option>Early Summer</option>
							<option>Late Summer</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="list-group" id="classes"></div>
				</div>
			</div>
		</div>
	</div>
	 
	<script>
		function selectTerm(term) {
			$.ajax({
				type: 'POST',
				url: 'getClasses.php',  
				data: "term="+term,  
				success: function(data) { 
					$("#classes").html("");
					for (var i = 0; i < data.length; i++) {
						$("#classes").append('<a onclick="selectClass('+data[i]["class_id"]+')" class="list-group-item">'+data[i]["class_name"]+'<span class="grade pull-right inline">100%</span></a>');
					}
				},
				dataType: "json"
			});
		}
		
		function selectClass(class_id) {
			$.ajax({
				type: 'POST',
				url: 'getAssignments.php',  
				data: "classID="+class_id,  
				success: function(data) { 
				console.log(data);
					// Fill table with assignment data
					    // Get add up total points, total score, and calc grade
					var totalPoints = 0;
					var totalScore = 0;
					$("#assignmentsTable").html("");
					if (data[0]) {
						for (var i = 0; i < data.length; i++) {
							$("#assignmentsTable").append('<tr><td><input type="checkbox" name="chk[]" /></td>'+
															  '<td><input type="text" name="week[]" class="form-control" value="'+data[i]["week"]+'"></td>'+
															  '<td><input type="text" name="name[]" class="form-control" value="'+data[i]["name"]+'"></td>'+
															  '<td><input type="text" name="due-date[]" class="form-control" value="'+data[i]["date"]+'"></td>'+
															  '<td><input type="text" name="points[]" class="form-control" value="'+data[i]["points"]+'"></td>'+
															  '<input type="hidden" name="assign_ids[]" value="'+data[i]["assign_id"]+'">'+
														   '</tr>');
							totalPoints += parseInt(data[i]["points"]);
							if (data[i]["score"] != '-') {
								totalScore += parseInt(data[i]["score"]);
							}
						}
					} else {
						$("#assignmentsTable").append('<tr>'+
														 '<td><input type="checkbox" name="chk[]" /></td>'+
														 '<td><input type="text" name="week[]" class="form-control"></td>'+
														 '<td><input type="text" name="name[]" class="form-control"></td>'+
														 '<td><input type="text" name="due-date[]" class="form-control"></td>'+
														 '<td><input type="text" name="points[]" class="form-control"></td>'+
													   '</tr>');
					}
					
					var grade = (totalScore / totalPoints) * 100;					
					
					$("#classNameInput").val(data[0]["class_name"]);
					$("#termInput").val(data[0]["term"]);
				},
				dataType: "json"
			});
		}		
		
	</script>