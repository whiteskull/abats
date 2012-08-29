<?php /* Smarty version 2.6.26, created on 2011-09-06 21:14:13
         compiled from abat.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title></title>
<link rel="stylesheet" href="/abat/files/css/style.css" type="text/css" />
<link rel="stylesheet" href="/abat/files/css/lavalamp.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/abat/files/css/slider.css" type="text/css" />
<script type="text/javascript" src="/abat/files/js/jquery.js"></script>
<script type="text/javascript" src="/abat/files/js/jqueryui.js"></script>
<script type="text/javascript" src="/abat/files/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="/abat/files/js/jquery.lavalamp.min.js"></script>
<script type="text/javascript" src="/abat/files/js/jquery.featureList-1.0.0.js"></script> 
<script type="text/javascript" src="/abat/files/js/script.js"></script>

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
			<img src="/abat/files/img/logo.png" />
		</div>
		
		<!-- Slider begin -->
		<div id="slider">

			<div id="feature_list">
			
				<ul id="tabs">
					<li>
						<a href="javascript:;">
							<img src="/abat/files/img/banner/game1.png" />
							<h3>Fifteen</h3>
							<span>Classical game</span>
						</a>
					</li>
					<li>
						<a href="javascript:;">
							<img src="/abat/files/img/banner/game2.png" />
							<h3>Crazy Runner</h3>
							<span>Remake Loderunner and Lemmings</span>
						</a>
					</li>
					<li>
						<a href="javascript:;">
							<img src="/abat/files/img/banner/game3.png" />
							<h3>Tank</h3>
							<span>Remake classic minesweeper</span>
						</a>
					</li>
				</ul>
				
				<ul id="output">
					<li>
						<img src="/abat/files/img/banner/sample1.png" style="padding-left: 75px;" /><a href="#">Посмотреть...</a>
					</li>
					<li>
						<img src="/abat/files/img/banner/sample2.png" /><a href="#">Посмотреть...</a>
					</li>
					<li>
						<img src="/abat/files/img/banner/sample3.png" /><a href="#">Посмотреть...</a>
					</li>
				</ul>

			</div>
		</div>
		<!-- Slider end -->
		<div id="android">
		</div>
		<!-- Menu begin -->
		<ul class="lavaLamp" id="main-menu">
			<?php $_from = $this->_tpl_vars['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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