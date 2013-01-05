<?php

/***************************************************************
* Function null_sidebar
* Override or disable sidebar logic
***************************************************************/

//function null_sidebar() { 
	//return false; 
//}

/***************************************************************
* Function custom_logo
* Filter the logo HTML
***************************************************************/

add_filter('null_custom_logo', 'custom_logo');

function custom_logo($logo) {

	//return '<h1>MAKE MY LOGO BIGGER</h1>';
	return $logo;

}

?>