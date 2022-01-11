<?php
/**
 * The main Router class file.
 *
 * PHP version 8.0
 *
 * @category  MVC_Framework
 * @package   Gothic
 * @author    Isaac Félix <isaac.felix@lobodeguerra.com>
 * @copyright 2022 Gothic PHP Framework
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @link      https://lobodeguerra.com
 */

namespace Gothic\Router;

/**
 * The main Router class.
 *
 * PHP version 8.0
 *
 * @category  MVC_Framework
 * @package   Gothic
 * @author    Isaac Félix <isaac.felix@lobodeguerra.com>
 * @copyright 2022 Gothic PHP Framework
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @link      https://lobodeguerra.com
 */
class Router
{
    /**
     * A var to hold registered routes.
     */
    private static array $_registered_routes;

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
    public static function processRequest()
    {
        // Get current request info from server details.
        $route = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        $route_obj = self::$_registered_routes[$route] ?? false;

        // Look for the route on the registered routes.
        if (false === $route_obj || $method !== $route_obj['method']) {
            // Throw 404 and exit.
            header('Status: 404 Not Found');
        }

        // If we could find the route, run route's callback.
        call_user_func($route_obj['callback'], $_REQUEST);
    }
}