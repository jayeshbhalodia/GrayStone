<?php

/**
 * A base model to provide the basic CRUD
 * actions for all models that inherit from it.
 *
 * @package CodeIgniter
 * @subpackage MY_Model
 * @license GPLv3 <http://www.gnu.org/licenses/gpl-3.0.txt>
 * @link http://github.com/philsturgeon/codeigniter-base-model
 * @version 1.3
 * @author Jamie Rumbelow <http://jamierumbelow.net>
 * @modified Phil Sturgeon <http://philsturgeon.co.uk>
 * @modified Dan Horrigan <http://dhorrigan.com>
 * @copyright Copyright (c) 2009, Jamie Rumbelow <http://jamierumbelow.net>
 */
//  CI 2.0 Compatibility
if (!class_exists('CI_Model'))
{

    class CI_Model extends Model
    {
        
    }

}

class MY_Model extends CI_Model
{

    /**
     * The database table to use, only
     * set if you want to bypass the magic
     *
     * @var string
     */
    protected $_table;
    /**
     * The primary key, by default set to
     * `id`, for use in some functions.
     *
     * @var string
     */
    protected $primary_key = 'id';
    /**
     * An array of functions to be called before
     * a record is created.
     *
     * @var array
     */
    protected $before_create = array();
    /**
     * An array of functions to be called after
     * a record is created.
     *
     * @var array
     */
    protected $after_create = array();
    /**
     * An array of validation rules
     *
     * @var array
     */
    protected $validate = array();
    /**
     * Skip the validation
     *
     * @var bool
     */
    protected $skip_validation = FALSE;

    /**
     * Wrapper to __construct for when loading
     * class is a superclass to a regular controller,
     * i.e. - extends Base not extends Controller.
     *
     * @return void
     * @author Jamie Rumbelow
     */
    public function MY_Model()
    {
        $this->__construct();
    }

    /**
     * The class constructer, tries to guess
     * the table name.
     *
     * @author Jamie Rumbelow
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('inflector');
        $this->_fetch_table();
    }

    public function __call($method, $arguments)
    {
        $db_method = array($this->db, $method);

        if (is_callable($db_method))
        {
            $result = call_user_func_array($db_method, $arguments);

            if (is_object($result) && $result === $this->db)
            {
                return $this;
            }

            return $result;
        }

        throw new Exception("class '" . get_class($this) . "' does not have a method '" . $method . "'");
    }

    /**
     * to select the table and write query
     *
     */
    public function select()
    {
        $q = db_select($this->_table);
        return $q;
    }

    public function get($id='')
    {
        if ($id != "")
        {
            $q = db_select($this->_table);
            $q->fields($this->_table);
            $q->condition('id',$id);
            $result = $q->execute()->fetch();

            return $result;
        }
    }

    /**
     * Insert a new record into the database,
     * calling the before and after create callbacks.
     * Returns the insert ID.
     *
     * @param array $data Information
     * @return integer
     * @author Jamie Rumbelow
     * @modified Dan Horrigan
     */
    public function insert($data)
    {
        $id = db_insert($this->_table)
                ->fields($data)
                ->execute();

        return $id;
    }

    /**
     * Update a record, specified by an ID.
     *
     * @param integer $id The row's ID
     * @param array $array The data to update
     * @return bool
     * @author Jamie Rumbelow
     */
    public function update($data, $conditions=array())
    {
        $num_updated = db_update($this->_table)
                ->fields($data);

        $num_updated = $this->_fetch_conditions($num_updated, $conditions);

        $num_updated = $num_updated->execute();

        return $num_updated;
    }

    /**
     * Delete a row from the database table by the
     * ID.
     *
     * @param integer $id
     * @return bool
     * @author Jamie Rumbelow
     */
    public function delete($conditions)
    {
        $num_deleted = db_delete($this->_table);

        $num_updated = $this->_fetch_conditions($num_deleted, $conditions);

        $num_deleted = $num_deleted->execute();

        return $num_deleted;
    }

    private function _fetch_conditions($queryobject, $conditions)
    {
        if (is_object($queryobject))
        {
            if (!empty($conditions))
            {

                foreach ($conditions as $key => $val)
                {
                    if (!empty($val))
                    {
                        if (isset($val[2]))
                        {
                            $queryobject->condition($val[0], $val[1], $val[2]);
                        } else
                        {
                            $queryobject->condition($val[0], $val[1]);
                        }
                    }
                }
            }
        }

        return $queryobject;
    }

    function dropdown()
    {
        $args = & func_get_args();

        if (count($args) == 2)
        {
            list($key, $value) = $args;
        } else
        {
            $key = 'id';
            $value = $args[0];
        }

        $q=db_select($this->_table);
        $q->fields($this->_table,array($key,$value));
        $result=$q->execute()->fetchAll();
        
        $options = array();
        foreach ($result as $row)
        {
            $options[$row->{$key}] = $row->{$value};
        }

        return $options;
    }

    /**
     * Fetches the table from the pluralised model name.
     *
     * @return void
     * @author Jamie Rumbelow
     */
    private function _fetch_table()
    {
        if ($this->_table == NULL)
        {
            $class = preg_replace('/(_m|_model)?$/', '', get_class($this));

            $this->_table = plural(strtolower($class));
        }
    }

}