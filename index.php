<?php
ini_set('session.save_handler', 'redis');
ini_set('session.save_path', "tcp://localhost:6379");

require __DIR__ . "/vendor/autoload.php";

session_start();
require __DIR__ . "/bootstrap/dependencies.php";
require __DIR__ . "/bootstrap/middleware.php";
require __DIR__ . "/bootstrap/routerKlein.php";
