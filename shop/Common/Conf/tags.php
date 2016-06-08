<?php
//开启checkLangBehavior
return array(
	'app_begin'     =>  array(
		'Behavior\ReadHtmlCache', // 读取静态缓存
		'Behavior\CheckLang',//开启checkLangBehavior
	),
);
