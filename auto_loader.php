<?php 

spl_autoload_registe('myAutoLoader');

function myAutoLoader($className) {
	$path = "classes";
	$ext = ".class.php";
	$fullPath = $path . $className . $ext;
}