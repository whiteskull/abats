<?php /* Smarty version Smarty-3.0.8, created on 2011-09-13 15:59:56
         compiled from "C:/www/android/abats/components/standart/menu.lavalamp/template/standart//index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100544e6f45bcd1a276-74539300%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b47301bad7224727f224a491ca36f2e2f8d84588' => 
    array (
      0 => 'C:/www/android/abats/components/standart/menu.lavalamp/template/standart//index.tpl',
      1 => 1315915127,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100544e6f45bcd1a276-74539300',
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
