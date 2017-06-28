<?php
date_default_timezone_set('Europe/Warsaw');
setlocale(LC_MONETARY, 'pl_PL');

// Environment
include 'config/environment.php';
include 'config/environment/' . Config::get('env') . '.php';

Config::set('web_address', (Config::get('env') == 'production') ? 'http://fotobum.pl' : 'http://fotobum.dev');
// Config::set('api_address', (Config::get('env') == 'production') ? 'https://api.booklet.pl' : 'http://api.booklet.dev');
// List of files to minify
Config::set('js_files',  ['application.js']);
Config::set('css_files', ['application.css']);

include 'config/secret.php';

// TIME FOR DATABASE
Config::set('mysqltime', "Y-m-d H:i:s");
