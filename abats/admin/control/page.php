<?php header('Content-type: text/html; charset=utf-8');?>
<? require_once($_SERVER['DOCUMENT_ROOT'].'/abats/admin/begin.php'); ?>
<?
    $path = $_POST['path'];
    $shortpath = str_replace(DOCUMENT, '/', $path);
    
    $content = file_get_contents($path);

    // extract templates
    $res = $db->select('value', 'a_config', 'name = "TEMPLATE"');
    $templateFolder = reset($db->fetchRow($res));
    $templates = explode('addContent(', $content);
    array_shift($templates);
    
    $templatesPath = array();
    foreach($templates as $temp) {
        $templatesPath[] = DOCUMENT.'abats/templates/'.$templateFolder.'/'.str_replace(array('\'', '"'), array('', ''), reset(explode(')', $temp)));
    }
    
?>
<div id="content-pages">
    <div class="content-menu-title">
        <p>Редактируемая страница: <? echo $shortpath; ?></p>
    </div>
    
    <div class="content-menu">
        <ul>
            <li class="content-menu-selected">Правка</li>
            <li>Настройки</li>
            <li>Доступ</li>
        </ul>
    </div>
    
    <div id="content-page">
        
        <? 
            foreach ($templatesPath as $templatePath) {
                echo '<textarea cols="80" rows="20">';
                    $templateContent = file_get_contents($templatePath);
                    echo $templateContent; echo $templateContent;
                echo '</textarea>';
            }
        ?>
        
    </div>
</div>