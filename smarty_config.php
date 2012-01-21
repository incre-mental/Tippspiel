<?php 
// Pfad zum Smarty Verzeichnis setzen (unter Windows)

	define('SMARTY_DIR', rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])), "/\\").'/Smarty/libs/');


// Smarty einbinden (der Dateiname beginnt mit großem 'S')
require_once(SMARTY_DIR . 'Smarty.class.php');

$smarty = new Smarty();

$smarty->template_dir = 'Smarty/templates/';
$smarty->compile_dir = 'Smarty/templates_c/';
$smarty->config_dir = 'Smarty/configs/';
$smarty->cache_dir = 'Smarty/cache/';

?>