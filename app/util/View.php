<?php
/**
 * The main layout file.
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

namespace App\Util;

/**
 * The main view class.
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
class View
{
    /**
     * A var to hold registered routes.
     */
    private static $_view_name;

    /**
     * Load the included view.
     *
     * @param string $viewName Then name of the view to load.
     * @param string $layout   Then name of the layout to load.
     *
     * @return string
     */
    public static function load(
        string $viewName,
        string $layout = 'default'
    ) : string {
        // Set view name.
        self::$_view_name = $viewName;

        // Load layout.
        return include_once __DIR__ . "/../../resources/views/layouts/{$layout}.php";
    }

    /**
     * Render the included view.
     *
     * @return string
     */
    public function render() : string
    {
        // Get view name.
        $viewName = self::$_view_name;

        // Load view.
        return include_once __DIR__ . "/../../resources/views/{$viewName}.php";
    }
}
