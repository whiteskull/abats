<?php /* Smarty version Smarty-3.0.8, created on 2011-09-08 12:59:10
         compiled from "C:/www/android/abats/components/standart/menu.lavalamp/template/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:325214e6883de810a08-63339565%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b9bdc25295954195e887f48dc7d7d107267b6c6' => 
    array (
      0 => 'C:/www/android/abats/components/standart/menu.lavalamp/template/index.tpl',
      1 => 1315472302,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '325214e6883de810a08-63339565',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<ul class="lavaLamp" id="lavalamp-menu">
	<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mainMenu')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
		<li <?php if ($_smarty_tpl->tpl_vars['i']->value['active']){?> class="current" <?php }?> ><a href="/<?php echo $_smarty_tpl->tpl_vars['i']->value['href'];?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
</a></li>
	<?php }} ?>
</ul>
