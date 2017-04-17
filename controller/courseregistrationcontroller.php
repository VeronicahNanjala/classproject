<?php
// call the class
require_once('../classes/coursesmanagement.php');

if(isset($_SESSION))
{
	//get user details
	$userid = $_SESSION['userid'];
	$majorid= $_SESSION['mid'];
}

//registered courses id

	function listunregcourses()
	{
		global $mjid;
		global $useid;
		//create a new instance of the class
		$unreglist = new courseregistration;
		$unreglist->registeredcoursesid($useid);
		$myquery=$unreglist->unregisteredcourses($mjid);
		if($myquery)
		{
			echo "   Code     Name     Year <br>";
			while($row=$unreglist->fetch())
			{

				echo "<input type='checkbox' name= 'regcs'>{$row['coursecode']}    {$row['coursename']}    {$row['courseyear']} <br>";
			}
		}

		// var_dump($unreglist->fetch());
	}
?>