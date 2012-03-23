<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Variables model
 * 
 * @author	Graystone Dev Team
 * @Module	User
 */
class Setup extends Admin_Controller
{

    var $talbes = array();

    function __construct()
    {
        parent::__construct();

        $this->tables['users2'] = "
                  CREATE TABLE IF NOT EXISTS users2 (
                      id int(11) NOT NULL AUTO_INCREMENT,
                      username varchar(50) NOT NULL,
                      password varchar(50) NOT NULL,
                      email_id varchar(100) NOT NULL,
                      created int(11) NOT NULL,
                      updated int(11) NOT NULL,
                      ip_address varchar(15) NOT NULL,
                      PRIMARY KEY (id)
                ) ENGINE=MyISAM  DEFAULT CHARSET=latin1
       ";
    }

    /**
     * for installation
     */
    function install()
    {
        if (!empty($this->tables))
        {
            foreach ($this->tables as $table)
            {
                db_query($table)->execute();
            }
        }
    }

    /**
     * for uninstallation
     */
    function uninstall()
    {
        
    }

    /**
     * information of the module
     */
    function _info()
    {
        
    }

    /**
     * for storing all menus
     */
    function _menus()
    {
        
    }

    /**
     * for storing all menus
     */
    function _permissions()
    {
        
    }

}