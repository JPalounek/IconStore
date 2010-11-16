<?php

/**
 * IconStore index file
 *
 * @copyright  Copyright (c) 2010 Jan Palounek
 * @package    IconStore
 */

// the identification of this site
define('SITE', 'IconStore');

// the identification of this site
define('VERSION', 'ALPHA');

// server name
define('SERVER_NAME', 'http://iconstore.local');

// absolute filesystem path to the web root
define('WWW_DIR', __DIR__);

// absolute filesystem path to the application root
define('APP_DIR', WWW_DIR . '/../app');

// absolute filesystem path to the libraries
define('LIBS_DIR', WWW_DIR . '/../libs');

// absolute filesystem path to the temporary files
define('TEMP_DIR', WWW_DIR . '/../temp');

// absolute filesystem path to the icons folder
define('ICON_DIR', WWW_DIR . '/icons');

// absolute filesystem path to the icons folder
define('ICON_DIR_NAME', 'icons');


// load bootstrap file
require APP_DIR . '/boot.php';