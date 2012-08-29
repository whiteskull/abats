<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$title}</title>
<link rel="stylesheet" href="/abats/files/css/style.css" type="text/css" />
<link rel="stylesheet" href="{$path}style.css" type="text/css" />
<script type="text/javascript" src="/abats/files/js/jquery.js"></script>
<script type="text/javascript" src="/abats/files/js/jqueryui.js"></script>
<script type="text/javascript" src="/abats/files/js/jquery.easing.min.js"></script>

{$header}

{literal}
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
{/literal}

</head>

<body>
    
<div id="page_wrapper">
	
	<div id="head">

		<div id="logo">
			<img src="{$path}img/logo.png" />
		</div>
		
		{$viewBanner}
		
		<div id="android">
		</div>
        
		{$mainMenu}
	
	</div>
	
    <table cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td width="800">
                <div id="content">
                    {$content}
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
