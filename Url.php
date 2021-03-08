<?php

define('PAGES_DIR','C:\xampp\htdocs\task44\pages\\');


function isQueryString()
{
	return !empty($_SERVER['QUERY_STRING']) ? true : false;
}


function getParam($param)
{
	if(isQueryString())
		return isset($_GET[$param]) && $_GET[$param] != '' ? strip_tags(trim($_GET[$param])) : null ;
	
}

function currentPage()
{
	if(!empty(getParam('page'))){
		return getParam('page');
	} else {
		return 'index';
	}
}


function getPage()
{

	$pageName =  PAGES_DIR.currentPage().'.php';
	
	$errorPage = PAGES_DIR.'error.php';
	if(is_file($pageName))
		return $pageName;
	else 
		return $errorPage;
}


