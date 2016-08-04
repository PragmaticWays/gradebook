function default24rows(tableID) {
	for (var h = 0; h < 22; h++) {
		var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
		var row = table.insertRow(rowCount);
		for (var i = 0; i < 5; i++) {
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[1].cells[i].innerHTML;
		}
	}
}

function addRow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	if(rowCount < 80){                            // limit the user from creating fields more than your limits
		var row = table.insertRow(rowCount);
		var colCount = table.rows[0].cells.length;
		for(var i = 0; i < colCount; i++) {
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[1].cells[i].innerHTML;
		}
	}else{
		 alert("There is no way you have more than 80 assignments for this one class.");
			   
	}
}

function deleteRow(tableID) {
	var table = document.getElementById(tableID); 
	var rowCount = table.rows.length;
	for(var i = 0; i < rowCount; i++) {
		var row = table.rows[i];
		var chkbox = row.cells[0].childNodes[0];		
		if(chkbox.checked == true) {
			if(rowCount <= 2) { 						// limit the user from removing all the fields
				alert("Cannot Remove all the Passenger.");
				break;
			}
			table.deleteRow(i);
			rowCount--;
			i--;
		} 
	} 
}