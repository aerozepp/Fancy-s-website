<?php

ob_start();
session_start();

if( isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
	
	$http_referer = $_SERVER['HTTP_REFERER'];//site address before
}


$current_file = $_SERVER['SCRIPT_NAME']; // current address

function loggedin(){

	if( isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) ){

		return true;
	}else{
		return false;
	}
}

function mysql_unreal_escape_string($string) {
    $characters = array('x00', 'n', 'r', '\\', '\'', '"','x1a');
    $o_chars = array("\x00", "\n", "\r", "\\", "'", "\"", "\x1a");
    for ($i = 0; $i < strlen($string); $i++) {
        if (substr($string, $i, 1) == '\\') {
            foreach ($characters as $index => $char) {
                if ($i <= strlen($string) - strlen($char) && substr($string, $i + 1, strlen($char)) == $char) {
                    $string = substr_replace($string, $o_chars[$index], $i, strlen($char) + 1);
                    break;
                }
            }
        }
    }
    return $string;
}

?>