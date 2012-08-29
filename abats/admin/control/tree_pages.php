<?php header('Content-type: text/html; charset=utf-8');?>
<? require_once($_SERVER['DOCUMENT_ROOT'].'/abats/admin/begin.php'); ?>

<div id="tree-pages-content">

    <? 
    
    
    $tree = $abats->getFolderTree();
    
    echo $abats->printFolderTree($tree, 0, 0);
    
    ?>
    
</div>