<?php
/**
 * The main Router class file.
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

namespace Gothic;

/**
 * The main Router class.
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
class Router
{
    /**
     * A var to hold registered routes.
     */
    private static array $_registered_routes;

    /**
     * A var to hold the current request object.
     */
    private static Request $_request;

    /**
     * Define the routes.
     *
     * @return void
     */
    public static function routes()
    {
        // Get user defined routes.
        include_once __DIR__ . '/../src/routes/api.php';
        include_once __DIR__ . '/../src/routes/web.php';
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

        // Create request object.
        self::createRequest();

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
     * Function to process create the request object from the http request.
     *
     * @return void
     */
    public static function createRequest()
    {
        // Get current request info from server details.
        // Request route.
        $route = filter_input(
            INPUT_SERVER,
            'REQUEST_URI',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );

        // Request method.
        $method = filter_input(
            INPUT_SERVER,
            'REQUEST_METHOD',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );

        // Start a new Request instance.
        self::$_request = new Request($route, $method);
    }

    /**
     * Function to process the current URL and match to a registered route.
     *
     * @return void
     */
    public static function processRequest()
    {
        // Check if route exists in registered routes.
        $route_arr = self::getMatchingRouteArr();

        // If route doesn't exist.
        if (true === empty($route_arr)
            // Or not with the passed method.
            || self::$_request->getMethod() !== $route_arr['method']
        ) {
            // Throw 404 and exit.
            header('Status: 404 Not Found');
        }

        // If we could find the route, and have the proper method, run callback.
        call_user_func($route_arr['callback'], self::$_request);
    }

    /**
     * Check if a given route exists.
     *
     * @param string $route The route to check for.
     *
     * @return bool If the route exists or not.
     */
    public static function routeExists(string $route) : bool
    {
        return array_key_exists($route, self::$_registered_routes);
    }

    /**
     * Get a matching route array.
     *
     * @return ?array Matching route array or null if not found.
     */
    public static function getMatchingRouteArr() : ?array
    {
        return self::$_registered_routes[self::$_request->getRoute()] ?? null;
    }
}
