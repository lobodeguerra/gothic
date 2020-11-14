<?php
/**
 * The main route file.
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

namespace App\Router;

use App\Util\Singleton;

/**
 * The main route class.
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
class Route extends Singleton
{
    /**
     * Class constructor.
     *
     * @param string   $route    The route path.
     * @param callable $callback The route callback.
     * @param string   $method   The route method.
     */
    public function __construct(
        string $route,
        callable $callback,
        string $method = 'GET'
    ) {
        
    }
}