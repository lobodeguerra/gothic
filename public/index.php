<?php
/**
 * The gateway.
 *
 * PHP version 7.4
 *
 * @category  MVC_Framework
 * @package   Gothic
 * @author    Isaac L. Felix <isaac@lobodeguerra.com>
 * @copyright 2020 Gothic PHP Framework
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @link      https://gothic.com
 */

// Declare namespace usage.
namespace App;

// Set a constant that let us know we entered through the gateway.
define('GOTHIC_GATEWAY', true);

// Composer autoload.
require_once __DIR__.'/../vendor/autoload.php';

// Bootstrap Gothic.
Gothic::bootstrap();
