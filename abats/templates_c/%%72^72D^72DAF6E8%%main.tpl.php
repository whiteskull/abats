<?php /* Smarty version 2.6.26, created on 2011-09-07 00:59:22
         compiled from main.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
<link rel="stylesheet" href="/abats/files/css/style.css" type="text/css" />
<link rel="stylesheet" href="/abats/files/css/lavalamp.css" type="text/css" media="screen" />
<script type="text/javascript" src="/abats/files/js/jquery.js"></script>
<script type="text/javascript" src="/abats/files/js/jqueryui.js"></script>
<script type="text/javascript" src="/abats/files/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="/abats/files/js/jquery.lavalamp.min.js"></script>
<script type="text/javascript" src="/abats/files/js/script.js"></script>

<?php echo $this->_tpl_vars['addHeader']; ?>


<?php echo '
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push([\'_setAccount\', \'UA-25454333-1\']);
	  _gaq.push([\'_trackPageview\']);

	  (function() {
		var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
		ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
		var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
'; ?>


</head>

<body>
    
<div id="page_wrapper">
	
	<div id="head">
	
		<div id="logo">
			<img src="/abats/files/img/logo.png" />
		</div>
		
		<?php echo $this->_tpl_vars['viewBanner']; ?>


		<!-- Menu begin -->
		<ul class="lavaLamp" id="main-menu">
			<?php $_from = $this->_tpl_vars['mainMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
				<li <?php if ($this->_tpl_vars['i']['active']): ?> class="current" <?php endif; ?> ><a href="/<?php echo $this->_tpl_vars['i']['href']; ?>
"><?php echo $this->_tpl_vars['i']['title']; ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
		<!-- Menu end -->
	
	</div>
	
    <table cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td width="800">
                <div id="content">
                    <?php echo $this->_tpl_vars['content']; ?>

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