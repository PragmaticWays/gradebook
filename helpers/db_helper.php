<?php
function getClassesByTerm($term) {
	$db = new Database();
	$db->query('SELECT classes.id AS class_id,
					   classes.class_name,
					   classes.term,
						users.id,
						users.email
				FROM classes 
				INNER JOIN users
				ON users.id = classes.user_id
				WHERE classes.term = :term
				AND users.email = :email
	');
	
	
	$db->bind(':term', $term);
	$db->bind(':email', $_SESSION['email']);
	
	// Assign rows
	$results = $db->resultset();
	
	// Get count
	return $results;
}

function getAssignmentsByClass($class_id) {
	$db = new Database();
	$db->query('SELECT assignments.*,
						assignments.id AS assign_id,
						users.id,
						users.email,
						classes.*
				FROM assignments 
				INNER JOIN classes
				ON assignments.class_id = classes.id
				INNER JOIN users
				ON assignments.user_id = users.id
				WHERE assignments.class_id = :class_id
				AND users.email = :email
	');
	
	
	$db->bind(':class_id', $class_id);
	$db->bind(':email', $_SESSION['email']);
	
	// Assign rows
	$results = $db->resultset();
	
	// Get count
	return $results;
}

?>