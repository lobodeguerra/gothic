<?php
/**
 * The main router class file.
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

namespace App;

use App\Util\Singleton;

/**
 * The main router class.
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
class Router extends Singleton
{
    /**
     * A var to hold registered routes.
     */
    private static $_registered_routes;

    /**
     * Init the router.
     *
     * @return void
     */
    public static function init()
    {
        // Include here your routes.
        
    }
}