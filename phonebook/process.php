<?php

/*ENTIRE CRUD DOCUMENTATION
	Abdul-Qudus Olajide & Tutorials from CleverTechie.com
	Completed 24th of February 2019, 12:14a.m
*/



//Started session so as to connect with other pages
session_start();


//Default values left blank or false
$name='';
$number ='';
$mail= '';
$socials ='';
$extra='';
$id = 0;
$update = false;


//Connect to MySql
$mysqli =mysqli_connect('localhost', 'root', '', 'phonebook');


//Test MySql Connection
if (mysqli_connect_errno()){
	echo 'DB Connection Error: '.mysqli_connect_error();
}


//Create Database
if (isset($_POST['save'])){
	$sql = "INSERT INTO `contacts`(`id`, `name`, `number`, `mail`, `socials`, `extra`) 
			VALUES(NULL, '".$_POST['name']."', '".$_POST['number']."', '".$_POST['mail']."', '".$_POST['socials']."', '".$_POST['extra']."')";
$query = mysqli_query($mysqli,$sql);

		if($query){
			header("Location: contact.php");
			echo "<p style='color:green'>Record Insertion Successful!!!</p>";
		}else{
			echo "<p style='color:red; font-size:65px;'>RECORD INSERTION FAILED!!!</p>";
		}

		$_SESSION['message'] = "Contact has been saved!";
		$_SESSION['msg_type'] = "success";
}



//Delete item in database
if (isset ($_GET['delete'])){
	$sql_id = $_GET['delete'];
	$remove = "DELETE FROM `contacts` WHERE id ='$sql_id'";
	$query = mysqli_query($mysqli, $remove);

	header("Location: contact.php");

	$_SESSION['message'] = "Contact has been deleted!";
	$_SESSION['msg_type'] = "danger";

}


//Read from database
if (isset ($_GET['edit'])){
	$id = $_GET['edit'];
	$update =true;
	$result = "SELECT * FROM `contacts` WHERE id ='$id'";
	$query = mysqli_query($mysqli,$result);
		if ($row=mysqli_fetch_assoc($query)){
				$name = $row['name'];
		 		$number = $row['number'];
		 		$mail = $row['mail'];
		 		$socials = $row['socials'];
		 		$extra = $row['extra'];
		}

}

//Update database
if (isset($_POST['update'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$number = $_POST['number'];
	$mail = $_POST['mail'];
	$socials = $_POST['socials'];
	$extra = $_POST['extra'];

	$result = "UPDATE `contacts` SET 	name = '$name', number = '$number', mail = '$mail', socials = '$socials', extra = '$extra' WHERE id = $id";
	$query = mysqli_query($mysqli, $result);

	$_SESSION['message']="Record has been updated";
	$_SESSION['msg_type']="warning";

	header("Location:contact.php");
}



?>



