<?php /* Smarty version Smarty-3.1.7, created on 2012-01-15 20:22:40
         compiled from "phasenmenu.php" */ ?>
<?php /*%%SmartyHeaderCode:230044f1327807b6fa8-27642754%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cecfbda799337db235a853acc847b96b9d2abaef' => 
    array (
      0 => 'phasenmenu.php',
      1 => 1326654632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '230044f1327807b6fa8-27642754',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f1327807bc6a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f1327807bc6a')) {function content_4f1327807bc6a($_smarty_tpl) {?><<?php ?>?php 
  include_once 'class/phase.php';
	include_once 'smarty_config.php';
	
	session_start ();
	
	if (isset ($_SESSION ['phasenmenu'])) {
		$phasen = unserialize ($_SESSION ['phasenmenu']);
	}
	else {
	  $phase = new Phase ();
		$phasen = $phase->get ();
		
		$_SESSION ['phasenmenu'] = serialize ($phasen);
	}
	
	$smarty->assign ('phasen', $phasen);
	$smarty->display ('phasenmenu.tpl');

?<?php ?>><?php }} ?>