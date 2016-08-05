<?php include('assets/header.php'); ?>
<?php include('assets/sidebar.php'); ?>
<script src="templates/assets/js/bootstrap-table-editable.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script> 

<form role="form" method="post" action="gradebook.php" id="gradebookForm" name="update_grade">
	<div class="col-md-8">
		<div class="block">
			<h2 class="sub-header" id="classNameHeader">Select a Class<span class="grade pull-right">-</span></h2>
			<div class="table-responsive">
				<table class="table table-striped" id="classTable">
					<thead>
						<tr>
							<th class="col-sm-2">Week</th>
							<th class="col-sm-3">Assignment</th>
							<th class="col-sm-2">Due</th>
							<th class="col-sm-2">Points</th>
							<th class="col-sm-2">Score</th>
						</tr>
					</thead>
					<tbody id="assignmentsTable">

					</tbody>
				</table>
			</div>
		</div>
	</div>
</form>

<?php include('assets/footer.php'); ?>