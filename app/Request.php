<?php
/**
 * The main Request class file.
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
 * The main Request class.
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
class Request
{
    /**
     * Request route.
     */
    private string $_route;

    /**
     * Request method.
     */
    private string $_method;

    /**
     * Request method.
     */

    /**
     * Constructor.
     *
     * @param string $route  The request route.
     * @param string $method The request method.
     */
    public function __construct(string $route, string $method)
    {
        $this->setRoute($route);
        $this->setMethod($method);
    }

    /**
     * Set the request route.
     *
     * @param string $route The route to set.
     *
     * @return void
     */
    public function setRoute(string $route)
    {
        $this->_route = $route;
    }

    /**
     * Get the request route.
     *
     * @return string
     */
    public function getRoute() : string
    {
        return $this->_route;
    }

    /**
     * Set the request method.
     *
     * @param string $method The method to set.
     *
     * @return void
     */
    public function setMethod(string $method)
    {
        $this->_method = $method;
    }

    /**
     * Get the request method.
     *
     * @return string
     */
    public function getMethod() : string
    {
        return $this->_method;
    }
}
