<?php
/**
 * The main view file.
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

namespace App\View;

use App\Lib\Singleton;

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
class View extends Singleton
{
    /**
     * A var to hold the current view name.
     */
    private static $_view_name;

    /**
     * A var to hold the path to the templates folder.
     */
    private static $_templates_path = __DIR__ . '/templates';

    /**
     * A var to hold the path to the layouts folder.
     */
    private static $_layouts_path = __DIR__ . '/templates/layouts';

    /**
     * Load the included view.
     *
     * @param string $viewName   The name of the view to load.
     * @param string $layoutName The name of the layout to load.
     *
     * @return string
     */
    public static function load(
        string $viewName,
        string $layoutName = 'default'
    ) : string {
        // Set view name.
        self::$_view_name = $viewName;

        // Get layouts path.
        $layouts_path = self::$_layouts_path;

        // Load layout.
        return include_once "{$layouts_path}/{$layoutName}.php";
    }

    /**
     * Render the included view.
     *
     * @return string
     */
    public static function render() : string
    {
        // Get view name.
        $viewName = self::$_view_name;

        // Get templates path.
        $templates_path = self::$_templates_path;

        // Load view.
        return include_once "{$templates_path}/{$viewName}.php";
    }
}
