<?php
/**
 * The main model class file.
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

namespace App\Model;

/**
 * The main model class.
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
class Model
{
    /**
     * A var to hold the related DB table name.
     */
    private $_table_name;

    /**
     * A var to hold the related DB table ID column name.
     */
    private $_id_column_name;

    /**
     * Class constructor.
     */
    public function __construct()
    {
    }

    /**
     * Function to create a model on the database.
     *
     * @return boolean
     */
    public function create()
    {
        return false;
    }

    /**
     * Function to read a model on the database.
     * 
     * @param int $object_id The object id on the database.
     *                       If not provided, fetches all.
     *
     * @return boolean
     */
    public function read(int $object_id = null)
    {
        return false;
    }

    /**
     * Function to update a model on the database.
     * 
     * @param int $object_id The object id on the database.
     *
     * @return boolean
     */
    public function update(int $object_id)
    {
        return false;
    }

    /**
     * Function to read a model on the database.
     * 
     * @param int $object_id The object id on the database.
     *
     * @return void
     */
    public function delete(int $object_id)
    {
        return false;
    }
}