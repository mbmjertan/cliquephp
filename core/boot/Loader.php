<?php

include 'vendor/autoload.php';
include 'app/Routes.php';


$CommandExecutionHandler = new Clique\Handlers\CommandExecutionHandler($Commands);
$CommandExecutionHandler->run($argc, $argv);
