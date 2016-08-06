     <div class="col-md-4">
		<div class="sidebar">
			<div class="block">
				<center><h3>Classes</h3></center>
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
	<script src="<?php echo BASE_URI; ?>templates/assets/js/gradebookHelpers.js"></script>