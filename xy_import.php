<?php 
if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); } 

function xy_import_navi() { 
	echo '<li ';
	if(isset($_GET['plug']) && $_GET['plug'] == 'xy_import') { echo 'class="active"'; }
	echo '><a href="index.php?mod=admin:setplug&plug=xy_import"><span class="glyphicon glyphicon-import"></span> 批量导入BDUSS</a></li>';
}

addAction('navi_2','xy_import_navi');
addAction('navi_8','xy_import_navi');
