<?php include('assets/header.php'); ?>
<?php include('assets/sidebarWithEdit.php'); ?>
<script src="<?php echo BASE_URI; ?>templates/assets/js/addClassLogic.js"></script>
<form role="form" method="post" action="edit-class.php">
	<div class="col-md-8">
		<div class="block">
			<center><h2>Edit A Class</h2></center>
				<table id="classTable" class="table">
					<div class="row">
						<div class="form-group">
							<label class="col-xs-2 col-form-label">Class Name</label>
							<div class="col-xs-5">
								<input type="text" name="className" class="form-control" id="classNameInput">
							</div>
							<label class="col-xs-1 col-form-label">Term:</label>
							<div class="col-xs-4">
								<select id="termInput" class="form-control" name="termName">
									<option value="Early Fall">Early Fall</option>
									<option value="Late Fall">Late Fall</option>
									<option value="Early Spring">Early Spring</option>
									<option value="Late Spring">Late Spring</option>
									<option value="Early Summer">Early Summer</option>
									<option value="Late Summer">Late Summer</option>
								</select>
							</div>
						</div>
					</div>
					<hr>
					<thead>
						<tr>
							<th class="col-xs-1">Select</th>
							<th class="col-xs-1">Week</th>
							<th class="col-xs-4">Assignment</th>
							<th class="col-xs-3">Due</th>
							<th class="col-xs-2">Points</th>
						</tr>
					</thead>
					<tbody id="assignmentsTable">
						
					</tbody>
			</table>
			<input type="submit" value="Save" name="do_update" onClick="submit" class="btn btn-primary" />
			<input type="submit" value="Delete Class" name="delete_class" class="btn btn-danger pull-right" style="margin: 0 5px;"/>
			<a href="new-class" type="button" value="Create New Class" class="btn btn-info pull-right" style="margin: 0 5px;">Create New Class</a> 
			<input type="button" value="Remove Row" onClick="deleteRow('classTable')" class="btn pull-right" style="margin: 0 5px;"/>
			<input type="button" value="Add Row" onClick="addRow('classTable')" class="btn pull-right" style="margin: 0 5px;"/> 
		</div>
	</div>
</form>
	 
<?php include('assets/footer.php'); ?>
