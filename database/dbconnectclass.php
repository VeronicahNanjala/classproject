<?php
/*
*@author Veronicah
*Database connection class
*/

// include databse cridentilas
require_once('dbcredentials.php');

/**
* 
*/
class dbconnection{
	/**
	*properties
	*/
	public $dbconnector; 
	public $dbresult; 
	/**
	* constructor 
	*/
	function __construct(){
		
	}
	/**
	*database connection method
	* @return return true or false
	*/
	public function connect(){
		/*
		* store connection to dbconnector property 
		*/
		$this ->dbconnector=mysqli_connect(DBHOST,DBUSERNAME,DBPASSWORD,DBNAME);

		if (mysqli_connect_errno()){
	   		 return false;
			}
			else
			{
			   return true;
			}
	}
	/*
	*Databse query method 
	* @param sql to be executed
	*@return return true or false
	*/
	public function query($sql){
		/*
		*Check if connection works 
		*/

		if (!$this -> connect()){
			return false;
		}
		
		/*
		*run query 
		*/
		$this ->dbresult=mysqli_query($this->dbconnector,$sql);

		/* 
		*check if any result was returned 
		*/
		if ($this->dbresult==false){
			return false;
		}
		else{
			return true;
		}
	}
	/*
	*Database feth methd 
	* @return return true or false
	*/
	public function fetch(){
		/*
		*check if result has content 
		*/
		if ($this->dbresult==false)
		{
			return false;
		}

		/*
		*return result
		*/
		return mysqli_fetch_assoc($this ->dbresult);
	}
}

/*
* method to return the number of rows from the database
*/
// public function getrows(){
// 	if($this->dbresults==false){
// 		return false;
// 	}
// 	return mysqli_num_rows($this->dbresult);
// }
/*


$mytestdb = new dbconnection;
//var_dump($mytestdb -> connect());
var_dump($mytestdb -> query('SELECT * FROM allmajor'));
var_dump($mytestdb -> fetch());
*/
 ?>					