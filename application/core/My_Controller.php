<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// Code here is run before ALL controllers
class MY_Controller extends CI_Controller
{

    // Deprecated: No longer used globally

    public function MY_Controller()
    {
        parent::__construct();
    }

    protected function is_ajax()
    {
        return $this->input->server('HTTP_X_REQUESTED_WITH') == 'XMLHttpRequest';
    }

}