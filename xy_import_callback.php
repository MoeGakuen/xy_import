<?php
function callback_install() {
	option::set('xy_import_gs','{百度ID}----BDUSS={百度BDUSS}');
}

function callback_remove() {
	global $m;
	$m->query("DELETE FROM `".DB_NAME."`.`".DB_PREFIX."options` WHERE `name` LIKE '%xy_import_%'");
}
