<?php
/**
*@author Veronicah Nanjala
*@version 1.0
**/

//include the database class
require('../database/dbconnectclass.php');

class courseregistration extends dbconnection
{
	//properties
	/**
	*@param userid -user id
	*@param majorid - user major
	*@param courses -courses for a user
	**/

	public $regcourses = null;

	//method
	//student registered courses
	function registeredcoursesid($myuserid)
	{
		//declare an array for my id
		$userid = array();
		//sql
		$sql = "SELECT c.courseid FROM allcourses as c INNER JOIN majorcourse as mj
		 ON c.courseid = mj.course_id INNER JOIN usercourses as ucs ON mj.msjorcourseid = ucs.majorcourse_id WHERE ucs.user_id = $myuserid";
		 //run query

		 $result = $this->query($sql);
		 if($result)
		 {
		 	//fetch the id
		 	while($row = $this->fetch())
		 	{
		 		$userid[] = $row['courseid'];
		 	}
		 	//asign
		 	return $this->regcoursecid;
		 }

	}
	//unregistered courses under major
	function unregisteredcourses($mjid)
	{
		//sql
		$sql = "SELECT ac.coursecode, ac.courseid, ac.coursename, ac.courseyear  FROM allcourses as ac ";//(and mc.course_id NOT IN (1,2,3))//in the bracket is the ids of registered courses so, all other courses will be dilpayed except those in bracket

		//check if user has registered any course
		if(empty($this->regcourseid)|| $this->regcourseid == NULL)
		{
			//run query
		return $this->query($sql);
		//return results

		}
		else
		{

		}
	}
	//course registration
	//check number of rows
	//delete user course registration	
}
?>