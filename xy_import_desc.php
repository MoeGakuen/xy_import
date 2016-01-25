<?php if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); } 
return array(
	'plugin' => array(
		'name'        => '批量导入BDUSS',
		'version'     => '1.2',
		'description' => '养小号再也不麻烦，小号再多也不怕！',
		'onsale'      =>  false,
		'url'         => 'http://tb.hydd.cc',
		'for'         => '3.8+',
        'forphp'      => '5.3'
	),
	'author' => array(
		'author'      => '学园',
		'email'       => 'i@hydd.cc',
		'url'         => 'http://www.xybk.cc'
	),
	'view'   => array(
		'setting'     => true,
		'show'        => false,
		'vip'         => false,
		'private'     => false,
		'public'      => false,
		'update'      => false,
	),
	'page'   => array(
		'ajax'
	)
);
