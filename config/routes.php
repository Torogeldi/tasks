<?php

return array(
	'admin/sort-([a-z]+)/page-([0-9]+)' => 'admin/index/$1/$2',
	'admin/sort-([a-z]+)' => 'admin/index/$1',
	'admin/page-([0-9]+)' => 'admin/index/$2/$1',
	'admin/task/([0-9]+)' => 'admin/edit/$1',
	'admin/logout' => 'admin/logout/',
	'admin/login' => 'admin/login/',
	'admin' => 'admin/index/',
	'task/add' => 'task/add/',
	'sort-([a-z]+)/page-([0-9]+)' => 'main/index/$1/$2',
	'sort-([a-z]+)/index.php/page-([0-9]+)' => 'main/index/$1/$2',
	'sort-([a-z]+)' => 'main/index/$1',
	'page-([0-9]+)' => 'main/index/$2/$1',
	'index.php/page-([0-9]+)' => 'main/index/$2/$1',
	'index.php/page-([0-9]+)' => 'main/index/$1',
	'404' => 'main/error/',
	'index.php' => 'main/index/',
	'' => 'main/index/'
);
