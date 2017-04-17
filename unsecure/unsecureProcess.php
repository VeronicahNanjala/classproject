<?php
/*
*function to populate the Major dropdown on login
*/
require_once('../database/dbconnectclass.php');
/*
*require_once('../unsecure/unsecureProcess.php');
*/
if (isset($_POST['login'])) {
	echo "User is logging in";
	/*
	*function for login verification
	*/
	validlogin();
}

elseif (isset($_POST['register'])) {
	echo "User is registering";
	/*
	*function for registration validation
	*/
	validregister();
}

function loadallmajors(){
	/*
	*create new instance of database
	*/ 
	$loadmajor = new dbconnection;
	/*
	*Write sql
	*/
	$sqlcode="SELECT * FROM allmajor";
	$majors=$loadmajor->query($sqlcode);
	//check if any result was returned 
		if($majors){
			while ($row=$loadmajor->fetch()) {
				echo "<option value=".$row['majorid'].">".$row['majorname']."</option>";
			}
		}
}

//function to validate registration 
function validregister(){
/*
*code for validation
*/
if (isset($_POST['username']) && !empty($_POST['username'])){
	 $user=preg_match('/^[a-z]+$/', $_POST['username']);
	 if ($user==true) {
	 $username = $_POST['username'];
	 }
	 	else{
	          echo "Username pattern is wrong. Only lowercase required <br>";
	        }

	}
	    else{
	           echo "User name is required";
	      	}

	  if (isset($_POST['password']) && !empty($_POST['password'])){
	  $code=preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@#$!%*?&])[A-Za-z\d$@#$!%*?&]{6,}/', $_POST['password']);
	  if ($code==true) {
	  $userPassword = $_POST['password'];
	  }
	  	else{
	  		echo "Poor password strength. Must contain at least one upper case, a symbol($@#$!%*?&), number and password length not less than 6 characters <br>";
	  		}
	          
	      }
	      		else{
	           echo "Password is required <br>";
	      			}

	  if (isset($_POST['firstname']) && !empty($_POST['firstname'])){
	  $fname=preg_match('/^[A-Za-z]+$/', $_POST['firstname']);
	  if ($fname==true) {
	  $userFirstName = $_POST['firstname'];
	        }
	        else{
	        	echo "First name pattern is wrong. Only letters required <br>";
	        	}
	          
	      }
	      	else{
	          echo "First name name is required<br>";
	          }

	   if (isset($_POST['lastname']) && !empty($_POST['lastname'])){
	   $lname=preg_match('/^[A-Za-z]+$/', $_POST['lastname']);
	   if ($lname==true) {
	   $userLastName = $_POST['lastname'];
	   }
	   	else{
	   		echo "Last name pattern is wrong. Only letters required<br>";
	   	}
	        

	     }else{
	         echo "Last name name is required<br>";
	          }

	     if (isset($_POST['email']) && !empty($_POST['email'])){
	        $email =$_POST["email"];
	        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	          echo "Invalid email format<br>"; 
	        }
	         $userEmail = $_POST['email'];

	     }else{
	         echo "Email is required <br>";
	          }

	    if (isset($_POST['gender']) && !empty($_POST['gender'])){      
	        $userGender = $_POST['gender'];

	    }else{
	        echo "Gender is required <br>";
	          }

	   if (isset($_POST['major']) && !empty($_POST['major'])){
	       $userMajor = $_POST['major'];
	   }else{
	       echo "Select a major from the list provided <br>";
	          }
		/*
		*if validation is successful run the function to check if username already exist
		*/
		checkusername();
}

/*
*function to check user name
*/
function checkusername(){
/*
*code to check if username already exist
*/
	/*
	*request username from the form and compare with usernames from database
	*/
		$name=$_REQUEST['username'];
		/*
		*Query to get all user names from the database
		*/
		$sql = "SELECT * FROM useraccount";
		$userNamsBD=new dbconnection;
		/*
		*run the query by calling the qiery method from dbconnect class
		*/
		$result=$userNamsBD->query($sql);
		if ($result==true){
			$row=$userNamsBD->fetch();
			if ($row['username'] ==$name) {
				echo "User name already exist. Choose a different username <br>";
			}
			else{
				/*
				*if username does not exist run the register function
				*/
				registernewuser();
			}
		}
}

function registernewuser(){
	/*
	*get data from field 
	*/
	$name=$_REQUEST['username'];
	$pw=$_REQUEST['password'];
	$firstName=$_REQUEST['firstname'];
	$lastName=$_REQUEST['lastname'];
	$mail=$_REQUEST['email'];
	$gender=$_REQUEST['gender'];
	$major=$_REQUEST['major'];
	$pwdhash=password_hash($pw,PASSWORD_DEFAULT);

	$sql="INSERT INTO useraccount (username,pwd,fname,lname,email,gender,major_id,userstatus,per_id)VALUES('$name','$pwdhash',
	'$firstName','$lastName','$mail','$gender','$major', 'ACTIVE',2)";

	$reguser=new dbconnection;

	 $result=$reguser->query($sql);

	 if($result){
	 	header('location: ../login/index.php');
	 }else{
	 	echo "User cannot be registered <br>";
	 }
}

//function to validate login
function validlogin(){
/*
*code for validation
*/
	      if (isset($_POST['usename']) && !empty($_POST['usename'])){
	          $username = $_POST['usename'];
	      }
	      else{
	           echo "User name is required <br>";
	      }

	      if (isset($_POST['password']) && !empty($_POST['password'])){
	          $userPassword = $_POST['password'];  
	      }else{
	           echo "Password name is required <br>";
	      }
/*
*if validation is successful, run the verifylogin function
*/
verifylogin();
}

function verifyLogin(){
	//registerNewUser();
	$username=$_REQUEST['usename'];
	$password=$_REQUEST['password'];
	$sql="SELECT * FROM useraccount WHERE username= '$username'";
	$verlogin= new dbconnection();
	$result=$verlogin->query($sql);

	if ($result) {
		$row=$verlogin->fetch();
		$name=$row['username'];
		$pass=$row['pwd'];
		$permit=$row['per_id'];
	
		if(password_verify($password, $pass)){
			session_start();
			$_SESSION['mid']=$row['major_id'];
			$_SESSION['userid']=$row['userid'];
			$_SESSION['username']=$name;
			$_SESSION['password']=$pass;
			$_SESSION['perid']=$permit;
			header("location: ../index.php");
		}else{
			echo "<br>login failed"; 
		}
	}


}

?>
