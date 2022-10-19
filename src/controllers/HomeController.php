<?php
/**
 * The Home Controller class file.
 *
 * PHP version 8.1
 *
 * @category  Your_App_Category
 * @package   YourApp
 * @author    Your Name <email@provider.com>
 * @copyright 2022 YourApp
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @link      https://yourwebsite.com
 */

namespace Controllers;

/**
 * The Home Controller class.
 *
 * PHP version 8.1
 *
 * @category  MVC_Framework
 * @package   Gothic
 * @author    Isaac L. Felix <isaac@lobodeguerra.com>
 * @copyright 2020 Gothic PHP Framework
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @link      https://gothic.com
 */
class HomeController extends \Gothic\Controller
{
    /**
     * Get the root view of the app.
     *
     * @param array $request The request that got us here.
     *
     * @return void
     */
    public static function home(array $request)
    {
        \Gothic\View::render('home');
    }
}
