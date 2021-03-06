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

namespace App\Router;

use App\Lib\Singleton;

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
     * Define the routes.
     *
     * @return void
     */
    public static function routes()
    {
        // Get user defined routes.
        include_once __DIR__ . '/routes/api.php';
        include_once __DIR__ . '/routes/web.php';
    }

    /**
     * Init the router.
     *
     * @return void
     */
    public static function init()
    {
        // Process routes.
        self::routes();

        // Process request.
        self::processRequest();
    }

    /**
     * Function to define a route.
     *
     * @param string   $route    The route path.
     * @param callable $callback The route callback.
     * @param string   $method   The route method.
     *
     * @return void
     */
    public static function route(
        string $route,
        callable $callback,
        string $method = 'GET'
    ) {
        self::$_registered_routes[$route] = [
            'callback' => $callback,
            'method' => $method
        ];
    }

    /**
     * Function to process a the current URL and match to a registered route.
     *
     * @return void
     */
    public function processRequest()
    {
        // Get current request info from server details.
        $route = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        $routeObj = self::$_registered_routes[$route] ?? false;

        // Look for the route on the registered routes.
        if (!$routeObj) {
            // Throw 404 and exit.
            header('Status: 404 Not Found');
        }

        // If we could find the route, run route's callback.
        call_user_func($routeObj['callback'], $_REQUEST);
    }
}