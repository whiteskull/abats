<?php /* Smarty version Smarty-3.0.8, created on 2011-09-08 15:56:59
         compiled from "C:/www/android/abats/templates/standart2\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34274e68ad8b951300-10798574%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0fb1cb327aa5000b1cf7fd143e79839f44432ce' => 
    array (
      0 => 'C:/www/android/abats/templates/standart2\\main.tpl',
      1 => 1315480636,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34274e68ad8b951300-10798574',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
<link rel="stylesheet" href="/abats/files/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('path')->value;?>
style.css" type="text/css" />
<script type="text/javascript" src="/abats/files/js/jquery.js"></script>
<script type="text/javascript" src="/abats/files/js/jqueryui.js"></script>
<script type="text/javascript" src="/abats/files/js/jquery.easing.min.js"></script>

<?php echo $_smarty_tpl->getVariable('header')->value;?>



	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-25454333-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>


</head>

<body>
    
<div id="page_wrapper">
	
	<div id="head">

		<div id="logo">
			<img src="<?php echo $_smarty_tpl->getVariable('path')->value;?>
img/logo.png" />
		</div>
		
		<?php echo $_smarty_tpl->getVariable('viewBanner')->value;?>

		
		<div id="android">
		</div>
        
		<?php echo $_smarty_tpl->getVariable('mainMenu2')->value;?>

	
	</div>
	
    <table cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td width="800">
                <div id="content">
                    <?php echo $_smarty_tpl->getVariable('content')->value;?>

            	</div>
            </td>
            <td width="205">
            </td>
        </tr>
    </table>
	
	<div id="footer">
	</div>
	
</div>
	
</body>
</html>
