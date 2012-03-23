<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH . "libraries/MX/Loader.php";

class MY_Loader extends MX_Loader
{
    /** Load a module view * */
    public function theme($view, $vars = array(), $return = FALSE,$path)
    {
        $this->_ci_view_path = $path;
        return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
    }

}