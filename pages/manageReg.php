<!DOCTYPE html>
<html>
<head>
	<title>Manage|| Registration</title>
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
require_once('../settings/core_ini.php');
require_once('../controller/courseregistrationcontroller.php');
verifylogin();
?>
<h1> Manage your registration</h1>

<form>
	<?php 

	?>
</form>
</body>
</html>