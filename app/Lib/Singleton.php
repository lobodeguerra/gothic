<?php
/**
 * The main Singleton class file.
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

namespace App\Lib;

/**
 * The main Singleton class.
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
class Singleton
{
    /**
     * A var to hold the singleton instance.
     */
    protected static $instance;

    /**
     * Handle singleton instance.
     *
     * @return void
     */
    public static function instance(): Singleton
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
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