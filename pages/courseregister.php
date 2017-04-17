<!DOCTYPE html>
<html>
<head>
	<title>Course||Registration</title>
</head>
<body>

<nav>
    <ul>
        <a href="courseregister.php">Register</a>
        <a href="manageReg.php">Manage registration</a>
        <a href="##">Manage courses</a>
        <a href="##">Manage majors</a>
        <a href="##">Assign grade</a>
        <a href="#">Grade</a>
        <a href="../login/logout.php">LOGOUT</a>
    </ul>
</nav>

	<?php
	//
	require_once('../settings/core_ini.php');
	//get class for registration
	require_once('../controller/courseregistrationcontroller.php');
		//check user login
		verifylogin();
		//get user template
		//getuserheader();
	?>
<h2>Course Register</h2>
<form>
	<?php 
	listunregcourses(); 
	?>
	<input type="submit" name="" value="register">
</form>
</body>
</html>

