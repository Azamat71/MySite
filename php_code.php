<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'database');

	// initialize variables
	$name = "";
	$sname = "";
	$email = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$sname = $_POST['sname'];
		$email = $_POST['email'];

		mysqli_query($db, "INSERT INTO Example1 (name, sname, email) VALUES ('$name', '$sname', '$email')"); 
		$_SESSION['message'] = "User list saved"; 
		header('location: index.php');
	}

	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$sname = $_POST['sname'];
		$email = $_POST['email'];

		mysqli_query($db, "UPDATE Example1 SET name='$name', sname='$sname', email='$email' WHERE id=$id");
		$_SESSION['message'] = "User list updated!"; 
		header('location: index.php');
	}

	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM Example1 WHERE id=$id");
		$_SESSION['message'] = "User list deleted!"; 
		header('location: index.php');
	}