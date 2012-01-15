<?php /* Smarty version Smarty-3.1.7, created on 2012-01-15 21:26:49
         compiled from "Smarty/templates\tippeingabe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:41234f12bfe28eb916-49024458%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64c28ccec0e35ec6c48bf5d7e763dbc66ff9f359' => 
    array (
      0 => 'Smarty/templates\\tippeingabe.tpl',
      1 => 1326659206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41234f12bfe28eb916-49024458',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f12bfe292c66',
  'variables' => 
  array (
    'phase' => 0,
    'begegnungen' => 0,
    'begegnung' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f12bfe292c66')) {function content_4f12bfe292c66($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:/Programme/xampp/php/Smarty/libs/plugins\\modifier.date_format.php';
?>

  <?php echo $_smarty_tpl->getSubTemplate ('phasenmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
  <h2><?php echo $_smarty_tpl->tpl_vars['phase']->value->getName();?>
</h2>
	<div>
		<form method = "POST" action="tippspeichern.php">
			<table>
				<?php  $_smarty_tpl->tpl_vars['begegnung'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['begegnung']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['begegnungen']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['begegnung']->key => $_smarty_tpl->tpl_vars['begegnung']->value){
$_smarty_tpl->tpl_vars['begegnung']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['begegnung']->key;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['begegnung']->value->getMannschaft1()->getName();?>
</td>
						<td><input type="text" name="<?php echo $_smarty_tpl->tpl_vars['begegnung']->value->getId();?>
1" value="<?php echo $_smarty_tpl->tpl_vars['begegnung']->value->getTipp()->getTore1();?>
"/></td>
						<td>:</td>
						<td><input type="text" name="<?php echo $_smarty_tpl->tpl_vars['begegnung']->value->getId();?>
2" value="<?php echo $_smarty_tpl->tpl_vars['begegnung']->value->getTipp()->getTore2();?>
"/></td>
						<td><?php echo $_smarty_tpl->tpl_vars['begegnung']->value->getMannschaft2()->getName();?>
</td>
						<td><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['begegnung']->value->getTimestamp();?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_modifier_date_format($_tmp1,"am %d.%m.%Y um %H:%M Uhr");?>
</td>
					</tr>
				<?php } ?>
			</table>
			
			<?php if ((sizeof($_smarty_tpl->tpl_vars['begegnungen']->value)>0)){?>
			  <input type="submit" value="Speichern"/>
			  <input type="button" value="Verwerfen" onClick="window.location.href=window.location.href"/>
			<?php }else{ ?>
			  Keine Begegnungen vorhanden!
			<?php }?>
		</form>
	</div><?php }} ?>