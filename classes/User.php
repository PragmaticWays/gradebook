<?php

class User {
	
	// Init DB var
	private $db;
	
	// Constructor
	public function __construct() {
		$this->db= new Database;
	}
	
	// Register user
	public function register($data) {
		
		// Insert query
		$this->db->query('INSERT INTO users (name, email, password) 
						  VALUES (:name, :email, :password)');
						  
		// Bind values
		$this->db->bind(':name', $data['name']);
		$this->db->bind(':email', $data['email']);
		$this->db->bind(':password', $data['password']);
		
		// Execute
		if ($this->db->execute()) {			
			return true;
		} else {
			return false;
		}
	}
	
	// User login
	public function login($email, $password) {
		$this->db->query("SELECT * FROM users WHERE email = :email");
		
		// Bind values
		$this->db->bind(':email', $email);
		
		// Assign row
		$row = $this->db->single();
		
		if (password_verify($password, $row->password)) {
			$this->setUserData($row);
			return true;
		} else {
			return false;
		}
		
		// Check rows
		if ($this->db->rowCount() > 0) {
			$this->setUserData($row);
			return true;
		} else {
			return false;
		}
	}
	
	public function newClass($weeks, $names, $duedates, $points, $class_name, $term_name) {
		// Create new class in classes table
		$this->db->query("INSERT INTO classes (class_name, user_id, term) VALUES (:class_name, :user_id, :term)");
		$this->db->bind(':class_name', $class_name);
		$this->db->bind(':user_id', $_SESSION['user_id']);
		$this->db->bind(':term', $term_name);
		
		if (!$this->db->execute()) {			
				return false;
		}
		
		// Get ID of new class
		$this->db->query("SELECT id FROM classes WHERE class_name = :class_name");
		$this->db->bind(':class_name', $class_name);
		$id = $this->db->single();
		
		// Insert assignments into assignments table with new class ID
		foreach ($weeks as $a => $b) {
			$this->db->query("INSERT INTO assignments (class_id, user_id, week, name, date, points, score)
									VALUES (:class_id, :user_id, :week, :name, :date, :point, :score)");
			// Bind values
			$this->db->bind(':class_id', $id->id);
			$this->db->bind(':user_id', $_SESSION['user_id']);
			$this->db->bind(':week', $weeks[$a]);
			$this->db->bind(':name', $names[$a]);
			$this->db->bind(':date', $duedates[$a]);
			$this->db->bind(':point', $points[$a]);
			$this->db->bind(':score', '-');
			
				// Execute
			if (!$this->db->execute()) {			
				return false;
			}
		}
		return true;
		
	}
	
	public function updateClass($assign_ids, $weeks, $names, $duedates, $points, $class_name, $term_name, $class_id) {
		foreach ($assign_ids as $a => $b) {
			$this->db->query("UPDATE assignments
							  SET week = :week,
									name = :name,
									date = :duedate,
									points = :point
							  WHERE id = :assign_id"
			);
			// Bind values
			$this->db->bind(':week', $weeks[$a]);
			$this->db->bind(':name', $names[$a]);
			$this->db->bind(':duedate', $duedates[$a]);
			$this->db->bind(':point', $points[$a]);
			$this->db->bind(':assign_id', $assign_ids[$a]);
			
			
			// Execute
			if (!$this->db->execute()) {			
				return false;
			}
		}
		// Update class name
		$this->db->query("UPDATE classes 
						  SET class_name = :class_name,
							  term = :term
						  WHERE id = :class_id");
						  
		$this->db->bind(':class_id', $class_id[0]);
		$this->db->bind(':term', $term_name);
		$this->db->bind(':class_name', $class_name);
		if (!$this->db->execute()) return false;
		
		return true;
	}
	
	public function updateScores($assign_ids, $scores) {
		foreach ($assign_ids as $a => $b) {
			$this->db->query("UPDATE assignments
							  SET score = :score
							  WHERE id = :assign_id"
			);
			// Bind values
			$this->db->bind(':score', $scores[$a]);
			$this->db->bind(':assign_id', $assign_ids[$a]);
			
			// Execute
			if (!$this->db->execute()) {			
				return false;
			}
		}
		return true;
	}
	
	public function deleteClass($class_id) {
		$this->db->query("DELETE FROM classes WHERE id = :class_id");
		
		// Bind values
		$this->db->bind(':class_id', $class_id[0]);
		
		// Execute
		if ($this->db->execute()) {			
			return true;
		} else {
			return false;
		}
		
	}
	
	// Set user data
	private function setUserData($row) {
		$_SESSION['is_logged_in'] = true;
		$_SESSION['user_id'] = $row->id;
		$_SESSION['name'] = $row->name;
		$_SESSION['email'] = $row->email;
	}
	
	
		// User logout
	public function logout() {
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_id']);
		unset($_SESSION['email']);
		unset($_SESSION['name']);
		return true;
	}
	
}
