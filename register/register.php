<!DOCTYPE html>
<html>
<head>
	<title>Veronicah || Nanjala</title>
	<meta charset="UTF-8"> 
	<link rel="stylesheet" href="../css/loginstyle.css"> 
</head>
<body>
<?php require_once('../unsecure/unsecureProcess.php');?>

	<div class="container">  
		<form id="contact" action="" name="regForm"   method="post" onsubmit="validateSignUp()">
			<center><h2>Register</h2></center>
            <fieldset>
                <input placeholder="Username" type="text" tabindex="1" id="uname" 
                       name="username" autofocus>
            </fieldset>
            <fieldset>
                <input placeholder="Password" type="password" tabindex="2" id="password"
                       name="password" >
            </fieldset>
            <fieldset>
                <input placeholder="First name" type="text" tabindex="3" id="fname"
                       name="firstname" >
            </fieldset>
            <fieldset>
                <input placeholder="Last name" type="text" tabindex="4" id="lname"
                       name="lastname" >
            </fieldset>
            <fieldset>
                <input placeholder="Email" type="email" tabindex="5" id="email"
                       name="email">
            </fieldset>
            <fieldset align ="left">
                <strong style="color: white">Select gender:</strong>
                    <input type="radio" name="gender" id="gender" value="M" CHECKED> Male
                    <input type="radio" name="gender" id="gender" value="F"> Female
            </fieldset>

            <fieldset>
                <select id="majorSelect" name="major" id="major">
                    <option value=""> Please Select a Major </option>;
                    <!-- Load database -->
                    <?php loadallmajors();?>
                </select>
            </fieldset>

            <fieldset>
                <button name="register" type="submit" id="registerSubmit" data-submit="...Sending">Register</button>
            </fieldset>

          <fieldset>
                <a href="../login/index.php" style="display:block; text-align: center;"> Login</a>
            </fieldset>

		</form>
	</div>
<script type="text/javascript" src="../js/validation.js"></script>
</body>
</html>