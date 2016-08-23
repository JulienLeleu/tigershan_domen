<?php
namespace tigershan_domen;

// Root for php folders (used to access file in function)
define('PHP_ROOT', __DIR__);
// Root for http request (resources as image, redirection, link ...)
define('HTTP_ROOT', 'localhost' == $_SERVER['HTTP_HOST'] ? '/localhost/' : '/');

// location for database file configuration
define('DATABASE_FILE_CONFIG',PHP_ROOT . '/app/config.xml');
// Name for database property in config.xml
define('DATABASE_NODE', 'database-name');