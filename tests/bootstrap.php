<?php
/**
 * This file is part of the travis-ci-example package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

define('HELLO_DB_DSN', getenv('DB_DSN'));
define('HELLO_DB_USERNAME', getenv('DB_USERNAME'));
define('HELLO_DB_PASSWORD', getenv('DB_PASSWORD'));

chdir(dirname(__DIR__));
require 'vendor/autoload.php';
