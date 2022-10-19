<?php
/**
 * The main Model class file.
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
 * The main Model class.
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
class Model
{
    /**
     * A var to hold the related DB table name.
     */
    private $_table_name;

    /**
     * A var to hold the related DB table id column name.
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
     * @param object $object The object to store on the database.
     *
     * @return bool True on creation success, false on failure.
     */
    public function create(object $object) : bool
    {
        return false;
    }

    /**
     * Function to read a model from the database.
     *
     * @param int $object_id The object id on the database.
     *
     * @return object
     */
    public function read(int $object_id) : object
    {
        return new \StdClass();
    }

    /**
     * Function to update a model on the database.
     *
     * @param int   $object_id The object id on the database.
     * @param array $data      The new object data.
     *
     * @return bool True on update success, false on failure.
     */
    public function update(int $object_id, array $data) : bool
    {
        return false;
    }

    /**
     * Function to delete a model on the database.
     *
     * @param int $object_id The object id on the database.
     *
     * @return bool True on delete success, false on failure.
     */
    public function delete(int $object_id) : bool
    {
        return false;
    }
}
