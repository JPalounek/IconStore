<?php

/**
 * IconStore bootstrap file.
 *
 * @copyright  Copyright (c) 2010 Jan Palounek
 * @package    IconStore
 */


use Nette\Debug;
use Nette\Environment;
use Nette\Finder;
use Nette\Application\Route;

// Load Nette framework
require LIBS_DIR . '/Nette/loader.php';


Debug::$strictMode = TRUE;
Debug::enable();

// Load system parts
require_once APP_DIR . '/Generator.php';
require_once APP_DIR . '/Grabber.php';
require_once APP_DIR . '/IconStore.php';

// Perform IconStore
$iconstore = new IconStore();
$iconstore->perform();

