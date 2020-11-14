<?php
/**
 * The main home controller class file.
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

namespace App\Controller;

use App\Util\Singleton;
use App\Util\View;

/**
 * The main home controller class.
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
class HomeController extends Singleton
{
    /**
     * Get the root view of the app.
     *
     * @param array $request The request that got us here.
     *
     * @return void
     */
    public function home($request)
    {
        View::load('home');
    }
}
