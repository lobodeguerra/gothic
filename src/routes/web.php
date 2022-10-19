<?php
/**
 * The web routes file.
 *
 * PHP version 8.1
 *
 * @category  MVC_Framework
 * @package   Gothic
 * @author    Isaac Félix <isaac.felix@lobodeguerra.com>
 * @copyright 2022 Gothic PHP Framework
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @link      https://lobodeguerra.com
 */

// Define routes.
\Gothic\Router::route('/', [\Controllers\HomeController::class, 'home']);
