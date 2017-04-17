<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Veronicah || Nanjala</title>  
    <link rel="stylesheet" href="../css/loginstyle.css">  
</head>

<body>
<?php require_once('../unsecure/unsecureProcess.php');?>
    <div class="container">  
        <form id="contact" action="" method="post" onsubmit="validateLogin()">
            <center><h2>Login</h2></center>
             <fieldset>
                <input placeholder="Username" type="text" tabindex="1" name="usename" id="uname" autofocus>
            </fieldset>
            <fieldset>
                <input placeholder="Password" type="password" tabindex="2" name="password" id="pass">
            </fieldset>

            <fieldset>
                <button name="login" type="submit" id="loginSubmit" data-submit="...Sending">Submit</button>
            </fieldset>

            <fieldset>
                <a href="../register/register.php" style="display:block; text-align: center;"> Sign up</a>
            </fieldset>
        </form>
    </div>

    <script type="text/javascript" src="../js/validation.js"></script>
</body>
</html>
