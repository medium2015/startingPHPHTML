<?php

$connection = mysqli_connect(
	$config['db']['server'],
	$config['db']['username'],
	$config['db']['password'],
	$config['db']['name']
);

if ($connection == false)
{	
	print_r($config);
	echo 'Не удалось подключиться к БД';
	echo mysqli_connect_error();
	die();
}
?>