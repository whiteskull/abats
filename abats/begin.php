<?php   define(DOCUMENT, $_SERVER['DOCUMENT_ROOT'].'/');
    
    // starting abats module
    require_once(DOCUMENT.'abats/module/DB.class.php');
	require_once(DOCUMENT.'abats/module/Abats.class.php');
    require_once(DOCUMENT.'abats/module/config.php');
    require_once(DOCUMENT.'abats/smarty/Smarty.class.php');			
    
    $db = new DB($DBhost, $DBuser, $DBpassword, $DBname, $DBcharset);
    $db->debug = true;
    
	$abats = new Abats;
    $abats->debug = true;
    
    $smarty = new Smarty();
    $smarty->caching = false;
    
    define(TEMPLATE, 'abats/templates/'.$abats->template.'/');
    
    $smarty->template_dir = DOCUMENT.'abats/templates/'.$abats->template;
    $smarty->compile_dir  = DOCUMENT.'abats/templates_c';
	$smarty->cache_dir = DOCUMENT.'abats/cache';
	$smarty->config_dir = DOCUMENT.'abats/config';
    
    // language setting
	if($locale) {
		setlocale(LC_ALL, $locale);
	}
	date_default_timezone_set('Europe/Moscow');
    
    // start session
	session_start();


    
