<? 	
	// include components at all pages
	if(file_exists(DOCUMENT.'/components.php')) {
		require_once(DOCUMENT.'/components.php');
	}
    
	// main
	$smarty->assign('path', '/'.TEMPLATE); // path to template
    $smarty->assign('title', $abats->title); // title of page
    $smarty->assign('header', $abats->header); // add resources in header
    $smarty->assign('content', $abats->content); // content of page
    
	$smarty->display('main.tpl'); // view page