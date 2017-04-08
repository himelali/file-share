<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = '';
$driver = 'pdo';

$db['default'] = array(
	'dsn'	   => "mysql:host=$dbhost;dbname=$dbname",
	'hostname' => $dbhost,
	'username' => $dbuser,
	'password' => $dbpass,
	'database' => $dbname,
	'dbdriver' => $driver,
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
