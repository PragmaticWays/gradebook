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
					// Fill table with assignment data
					    // Get add up total points, total score, and calc grade
					var totalPoints = 0;
					var totalScore = 0;
					$("#assignmentsTable").html("");
					for (var i = 0; i < data.length; i++) {
						$("#assignmentsTable").append('<tr><td>'+data[i]["week"]+'</td><td>'+data[i]["name"]+'</td><td>'+data[i]["date"]+'</td><td>'+data[i]["points"]+'</td><td contenteditable="true">'+data[i]["score"]+'</td></tr>');
						totalPoints += parseInt(data[i]["points"]);
						if (data[i]["score"] != '-') {
							totalScore += parseInt(data[i]["score"]);
						}
					}
					var grade = (totalScore / totalPoints) * 100;
					console.log(totalScore);
					console.log(totalPoints);
					console.log(grade);
					
					$("#classNameHeader").html("");
					$("#classNameHeader").html(data[0]["class_name"]+'<span class="grade pull-right">'+Math.round(grade * 100) / 100+'%</span>');
					
				},
				dataType: "json"
			});
		}		
		
	</script>