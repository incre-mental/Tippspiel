<?php /* Smarty version Smarty-3.1.7, created on 2012-01-23 13:00:10
         compiled from "Smarty/templates\phasenmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155404f12fc0d2f0f40-07294552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '303f40be5c2cd57d08d979072e86ee7d01287827' => 
    array (
      0 => 'Smarty/templates\\phasenmenu.tpl',
      1 => 1327242540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155404f12fc0d2f0f40-07294552',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f12fc0d364ea',
  'variables' => 
  array (
    'phasen' => 0,
    'phase' => 0,
    'child' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f12fc0d364ea')) {function content_4f12fc0d364ea($_smarty_tpl) {?>

<link rel="stylesheet" type="text/css" href="style.css">
<script type='text/javascript' src="jquery-1.7.1.js"></script>

<div class="GruppenMenu">
<?php  $_smarty_tpl->tpl_vars['phase'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['phase']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['phasen']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['phase']->key => $_smarty_tpl->tpl_vars['phase']->value){
$_smarty_tpl->tpl_vars['phase']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['phase']->key;
?>
  <div class="GruppenMenuEintrag" id="<?php echo $_smarty_tpl->tpl_vars['phase']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['phase']->value->getName();?>
</div>
  <?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['phase']->value->getChilds(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value){
$_smarty_tpl->tpl_vars['child']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['child']->key;
?> 
	  <div class="GruppenMenuUntereintrag" id="<?php echo $_smarty_tpl->tpl_vars['child']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value->getName();?>
</div> 
	<?php } ?>
<?php } ?>
</div>

<script type='text/javascript' src="menu.js"></script><?php }} ?>