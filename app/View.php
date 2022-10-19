<?php
/**
 * The main view file.
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
 * The main view class.
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
class View
{
    /**
     * A var to hold the current view name.
     */
    private static string $_view_name;

    /**
     * A var to hold the path to the templates folder.
     */
    private static string $_templates_path = __DIR__ . '/../src/views';

    /**
     * A var to hold the path to the layouts folder.
     */
    private static string $_layouts_path = __DIR__ . '/../src/views/layouts';

    /**
     * Render a view through a layout.
     *
     * @param string $view_name  The name of the view to load.
     * @param array  $data       Data to be passed to the view from the controller.
     * @param string $layoutName The name of the layout to load.
     *
     * @return string
     */
    public static function render(
        string $view_name,
        array $data = [],
        string $layoutName = 'default'
    ) : string {
        // Set view name.
        self::$_view_name = $view_name;

        // Get layouts path.
        $layouts_path = self::$_layouts_path;

        // Create variables from passed data in the current scope.
        extract($data);

        // Load layout.
        return include_once "{$layouts_path}/{$layoutName}.php";
    }

    /**
     * Inject the included view.
     *
     * @param $data Data to be passed to the view from the controller.
     *
     * @return string
     */
    public static function inject(array $data = []) : string
    {
        // Get view name.
        $view_name = self::$_view_name;

        // Get templates path.
        $templates_path = self::$_templates_path;

        // Create variables from passed data in the current scope.
        extract($data);

        // Unset parent data array.
        unset($data);

        // Load view.
        return include_once "{$templates_path}/{$view_name}.php";
    }
}
