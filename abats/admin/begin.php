<?php   define(DOCUMENT, $_SERVER['DOCUMENT_ROOT'].'/');
    
    // starting abats admin module
    require_once(DOCUMENT.'abats/module/DB.class.php');
	require_once(DOCUMENT.'abats/module/config.php');
	require_once(DOCUMENT.'abats/admin/module/Abats.class.php');
    
    $db = new DB($DBhost, $DBuser, $DBpassword, $DBname, $DBcharset);
    $db->debug = true;
    
	$abats = new Abats;
    $abats->debug = true;
    
    // language setting
	if($locale) {
		setlocale(LC_ALL, $locale);
	}
	date_default_timezone_set('Europe/Moscow');
    
    // start session
	session_start();


    
