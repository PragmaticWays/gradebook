<?php include('assets/header.php'); ?>
<?php include('assets/sidebar.php'); ?>
<script src="<?php echo BASE_URI; ?>templates/assets/js/addClassLogic.js"></script>
<form role="form" method="post" action="<?php echo BASE_URI; ?>addClassLogic.php">
	<div class="col-md-8">
		<div class="block">
			<center><h2>New Class</h2></center>
				<table id="classTable" class="table">
					<div class="row">
						<div class="form-group">
							<label class="col-xs-2 col-form-label">Class Name</label>
							<div class="col-xs-5">
								<input type="text" name="class" class="form-control">
							</div>
							<label class="col-xs-1 col-form-label">Term:</label>
							<div class="col-xs-4">
								<select id="term" class="form-control">
									<option>Early Fall</option>
									<option>Late Fall</option>
									<option>Early Spring</option>
									<option>Late Spring</option>
									<option>Early Summer</option>
									<option>Late Summer</option>
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
					<tbody>
						<tr>
							<td><input type="checkbox" name="chk[]" /></td>
							<td>
								<input type="text" name="week[]" class="form-control">
							</td>
							<td>
								<input type="text" name="name[]" class="form-control">
							</td>
							<td>
								<input type="text" name="due-date[]" class="form-control">
							</td>
							<td>
								<input type="text" name="points[]" class="form-control">
							</td>
						</tr>
					</tbody>
			</table>
			<input type="button" value="Submit" onClick="submit" class="btn btn-primary" />
			<input type="button" value="Remove Row" onClick="deleteRow('classTable')" class="btn pull-right"/>
			<input type="button" value="Add Row" onClick="addRow('classTable')" class="btn pull-right" style="margin-right: 10px;"/> 
		</div>
	</div>
</form>

<script>default24rows('classTable');</script>
	 
<?php include('assets/footer.php'); ?>
