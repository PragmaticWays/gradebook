// This function is used on the gradebook homepage when a user selects a term,
//		the classes for that term will be dynamically displayed through AJAX
function selectTerm(term) {
	$.ajax({
		type: 'POST',
		url: 'getClasses.php',  
		data: "term="+term,  
		success: function(data) { 
			$("#classes").html("");
			for (var i = 0; i < data.length; i++) {
				$("#classes").append('<a onclick="selectClass('+data[i]["class_id"]+')" class="list-group-item">'+data[i]["class_name"]+'</a>');
			}
		},
		dataType: "json"
	});
}
		
// This function is used on the gradebook homepage when a user selects a class,
//		the assignments for that class will be dynamically displayed through AJAX

// Global var because it's 3:30AM and I just want this finished already.
var gradePercent;
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
			for (var i = 0; i < data.length; i++) {
				
				$("#assignmentsTable").append('<tr>'+
												'<td>'+data[i]["week"]+'</td>'+
												'<td>'+data[i]["name"]+'</td>'+
												'<td>'+data[i]["date"]+'</td>'+
												'<td>'+data[i]["points"]+'</td>'+
												'<td><input onblur="updateGrade()" type="text" name="scores[]" class="form-control inputScore" value="'+data[i]["score"]+'"></td>'+
												'<input type="hidden" name="assign_ids[]" value="'+data[i]["assign_id"]+'">'+
												'<input type="hidden" name="class_id[]" value="'+data[i]["class_id"]+'">'+
											  '</tr>');
				
				if (data[i]["score"] != '') {
					totalScore += parseInt(data[i]["score"]);
					totalPoints += parseInt(data[i]["points"]);
				}
			}
			var grade = 0;
			if (totalPoints > 0) grade = (totalScore / totalPoints) * 100;
			
			$("#classNameHeader").html("");
			gradePercent = Math.round(grade * 100) / 100;
			$("#classNameHeader").html(data[0]["class_name"]+'<span id="grade" class="pull-right">'+gradePercent+'%</span>');
			var hex = getColor(gradePercent);
			$("#grade").css("color", hex);
		},
		dataType: "json"
	});
}

// This function captures if a user presses the [Enter] key on the 
//		input field on the gradebook homepage. If so, it will call the 
//		updateGrade() function below
$(function() {
	$("#assignmentsTable").keypress(function (e) {
		if (e.which == 13) {	
			e.preventDefault();				
			updateGrade();
		}   
	});
});

// This function will dynamically update the class's grade % as a user
//		enters in the different score inputs. 
function updateGrade() {
	$.ajax({
		type: 'POST',
		url: $("#gradebookForm").attr("action"),
		data: $("#gradebookForm").serialize(), 
		success: function(response) { 
			selectClass($("#gradebookForm").find('input[name="class_id[]"]').val());
			var hex = getColor(gradePercent);
			$("#grade").css("color", hex);
		},
	});
}

// Helper function to getting percentage color
function getColor(percent) {
	if (percent >= 95) return "#4CB848";
	else if (percent >= 90) return "#7AC142";
	else if (percent >= 85) return "#9DCC3B";
	else if (percent >= 80) return "#BDD630";
	else if (percent >= 75) return "#DCE11C";
	else if (percent >= 70) return "#F7C807";
	else if (percent >= 65) return "#F6891F";
	else if (percent >= 60) return "#F46622";
	else if (percent < 60) return "#EE3223";
}