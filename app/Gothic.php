<?php
/**
 * The main Gothic class file.
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

use App\Lib\Singleton;
use App\Router\Router;

/**
 * The main bootstrap class.
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
class Gothic extends Singleton
{
    /**
     * Construct the app.
     *
     * @return void
     */
    public static function bootstrap()
    {
        // 1. Start router.
        Router::init();
    }
}