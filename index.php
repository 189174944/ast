<?php

use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

require './vendor/autoload.php';
$logger = new Logger('my_logger');
$logger->pushHandler(new StreamHandler(__DIR__.'/storage/logs/my_app.log', Logger::DEBUG));
$logger->addInfo('Adding a new user', array('username' => 'Seldaek'));
//
