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
class Router
{
    /**
     * A var to hold the singleton instance.
     */
    private static $_instance;

    /**
     * A var to hold registered routes.
     */
    private static $_registered_routes;

    /**
     * Handle singleton instance.
     *
     * @return void
     */
    public static function instance(): Router
    {
        if (!isset($this->_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    /**
     * Init the router.
     *
     * @return void
     */
    public static function init()
    {
        // Include here your routes.
    }

    /**
     * It's not allowed to create multiple instances,
     * you have to obtain the instance from Singleton::getInstance() instead
     */
    private function __construct()
    {
    }

    /**
     * Prevent the instance from being cloned.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Prevent from being unserialized (which would create a second instance of it)
     *
     * @return void
     */
    private function __wakeup()
    {
    }
}