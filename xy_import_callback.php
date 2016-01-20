<?php
function callback_install() {
	option::set('xy_import_gs','{百度ID}----BDUSS={百度BDUSS}');
	option::set('xy_import_check',1);
	option::set('xy_import_refresh',1);
}

function callback_remove() {
	global $m;
	$m->query("DELETE FROM `".DB_NAME."`.`".DB_PREFIX."options` WHERE `name` LIKE '%xy_import_%'");
}
