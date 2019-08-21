<?php
ini_set('session.save_handler', 'redis');
ini_set('session.save_path', "tcp://localhost:6379");
session_start();

$count = $_SESSION['count'] ?? 1;

print session_save_path() . "<br>";
print session_id() . "<br>";
print $count;
$_SESSION['count'] = ++$count;
