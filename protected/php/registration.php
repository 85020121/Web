<?php
include "personsManager.php";
if(isset($_GET['jsCheck'])){
	$_GET['jsCheck']();
}

function dbConnect() {
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=legumes;charset=UTF8', 'bowen', 'waiwai');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	return $db;
}


function isUsernameExist()
{
	$db = dbConnect();
	$user_name=$_POST['user_name'];
	if (strlen($user_name) < 6) {
		echo "short";
		return;
	}
		  
	$manager = new PersonsManager($db);
  	if ($manager->isUsernameExist($user_name) > 0) {
		echo "no";
	} else {
		echo 'yes';
	}  
}

function registUser() {
	$db = dbConnect();
	$user_info = array(
    			'login' => $_POST['username'],
    			'password' => sha1($_POST['pass']),
    			'email' => $_POST['email'],
    			'name' => $_POST['name'],
    			'streetNum' => $_POST['streetNum'],
    	    	'street' => $_POST['street'],
    	   		'city' => $_POST['city'],
     			'gender' => isset($_POST['gender'])?($_POST['gender']):'',
 	    		'tel' => $_POST['tel'],
    	    	'fixe' => $_POST['fixe']
    	);
	$manager = new PersonsManager($db);
	$person = $manager->personMaker($user_info);
	$succes = $manager->addPerson($person);
	if($succes) {
		if(!session_id()) {session_start();}
		$_SESSION['id'] = $succes;
    	$_SESSION['login'] = $_POST['username'];	
	}
	return $succes;
}

function login() {
	$db = dbConnect();
 	$manager = new PersonsManager($db);
 	$result = $manager->login($_POST['loginUsername'], $_POST['loginPsw']);
	if ($result) {
	    if(!session_id()) {session_start();}
    	$_SESSION['id'] = $result['id'];
	    $_SESSION['login'] = $_POST['loginUsername'];
	    return true;
	} else {
	    return false; 
	}
	
}

function getPersonInfo($id) {
	$db = dbConnect();
 	$manager = new PersonsManager($db);
 	$personInfo = $manager->getPersonInfo($id);
	if ($personInfo) {
    	$_SESSION['personInfo'] = $personInfo;
	    return true;
	} else {
	    return false; 
	}	
}


function logout(){
	if(isset($_SESSION['id']))
		unset($_SESSION['id']);
	if(isset($_SESSION['login']))
		unset($_SESSION['login']);
	session_unset();
	session_destroy();
}

?>