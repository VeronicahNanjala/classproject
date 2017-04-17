<?php 
session_start();

function verifylogin(){
    if (isset($_SESSION['userid'])&& !empty($_SESSION['userid'])){
        //$userid=$_SESSION['userid'];
        //valid user
        //check for user permission
    }else{
        //not valid
        header('location:login/');
    }
}

function getuserheader(){
    //check user permission
    if ($_SESSION['perid']==1){
        //include the right header
        require_once $_SERVER['DOCUMENT_ROOT']."/classproject2017/layout/standardlayout.php";
        //require_once('../layout/standardlayout.php');
    }else if($_SESSION['perid']==2){
        // include the right header
       require_once $_SERVER['DOCUMENT_ROOT']."/classproject2017/layout/adminheader.php";
       // require_once('../layout/adminheader.php');
    }
}
#get curren page 
#get previous page 
#ob start for headers
#call layout based on permission 
#other functions 
?>