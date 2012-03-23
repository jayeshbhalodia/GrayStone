<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Template library
 *
 * This is template library for the
 *
 * @package CodeIgniter
 * @author  Karan Jilka
 * @since   Version 1.0
 */
// --------------------------------------------------------------------

/**
 * @author    Karan Jilka
 * @category    Libraries
 * @version 1.4.1
 */
class CI_Template
{

    var $CI;
    var $template;
    var $theme_path = 'theme/';
    var $template_ar = array(
        'content' => '',
        'scripts' => '',
        'styles' => '',
        'title' => '',
    );
    var $scripts;
    var $styles;
    var $layout;
    var $template_region = array();

    /**
     * Constructor
     *
     * Loads template configuration, template regions, and validates existence of
     * default template
     *
     * @access    public
     */
    function CI_Template()
    {
        // Copy an instance of CI so we can use the entire framework.
        $this->CI = & get_instance();
    }

    // --------------------------------------------------------------------

    /**
     * to set the template for rendering out put
     * @param type $template_name
     */
    public function set_theme($template_name)
    {
        $this->template = $template_name . '/';
    }

    /**
     * to set the file of the layout
     * @param type $file
     */
    public function set_layout($file="")
    {
        if ($file != "")
        {
            // Load template setting file;
            include($this->theme_path . $this->template . 'setting' . EXT);

            //sotre layout file
            $this->layout = $file;

            if (isset($template) && array_key_exists($file, $template))
            {
                $this->template_ar = $template[$file];
                $this->template_ar['scripts'] = "";
                $this->template_ar['styles'] = "";
                $this->template_ar['title'] = "";
                $this->template_ar['content'] = "";
            }
        } else
        {

            //sotre layout file
            $this->layout = '';
        }
    }
    
    /**
     *to set title
     * @param type $text 
     */
    public function set_title($text)
    {
        $this->template_ar['title'] .= $text;
    }

    /**
     * to set region
     * @param type $region
     * @param type $file
     * @param type $data
     * @param type $appned
     * @param type $theme 
     */
    public function set_region($region, $file, $data=array(), $appned=true, $theme=false)
    {
        $this->template_region[] = array(
            'region' => $region,
            'file' => $file,
            'data' => $data,
            'append' => $appned,
            'theme' => $theme,
        );
    }
    
    /**
     * to set content
     * @param type $file
     * @param type $data
     * @param type $appned
     * @param type $theme 
     */
    public function set_content($file, $data=array(), $appned=true, $theme=false)
    {
        if ($appned)
        {
            if ($theme)
            {
                $path = $this->theme_path . $this->template;
                $this->template_ar['content'].= $this->CI->load->theme($file, $data, TRUE, $path);
            } else
            {
                $this->template_ar['content'].= $this->CI->load->view($file, $data, TRUE);
            }
        } else
        {
            if ($theme)
            {
                $path = $this->theme_path . $this->template;
                $this->template_ar['content'] = $this->CI->load->theme($file, $data, TRUE, $path);
            } else
            {
                $this->template_ar['content'] = $this->CI->load->view($file, $data, TRUE);
            }
        }
    }
    
    /**
     * to load css or js files before the theme files
     * @param type $file
     * @param type $type
     * @param type $theme 
     */
    public function prepend_metadata($file, $type="", $theme=true)
    {
        if ($type == "js")
        {
            if ($theme)
            {
                $path = $this->theme_path . $this->template;
                $this->scripts['prepend']['scripts'][] = "<script src='" . base_url() . $path . $file . "' type='text/javascript'></script>";
            } else
            {
                $this->scripts['prepend']['scripts'][] = "<script src='" . base_url() . $file . "' type='text/javascript'></script>";
            }
        }

        if ($type == "css")
        {
            if ($theme)
            {
                $path = $this->theme_path . $this->template;
                $this->scripts['prepend']['styles'][] = "<link rel='stylesheet' type='text/css' href='" . base_url() . $path . $file . "' />";
            } else
            {
                $this->scripts['prepend']['styles'][] = "<link rel='stylesheet' type='text/css' href='" . base_url() . $file . "' />";
            }
        }
    }
    
    /**
     * to load css or js file after the theme files
     * @param type $file
     * @param type $type
     * @param type $theme 
     */
    public function append_metadata($file, $type="", $theme=true)
    {
        if ($type == "js")
        {
            if ($theme)
            {
                $path = $this->theme_path . $this->template;
                $this->scripts['append']['scripts'][] = "<script src='" . base_url() . $path . $file . "' type='text/javascript'></script>";
            } else
            {
                $this->scripts['append']['scripts'][] = "<script src='" . base_url() . $file . "' type='text/javascript'></script>";
            }
        }

        if ($type == "css")
        {
            if ($theme)
            {
                $path = $this->theme_path . $this->template;
                $this->scripts['append']['styles'][] = "<link rel='stylesheet' type='text/css' href='" . base_url() . $path . $file . "' />";
            } else
            {
                $this->scripts['append']['styles'][] = "<link rel='stylesheet' type='text/css' href='" . base_url() . $file . "' />";
            }
        }
    }

    /**
     * internal function to set all the regions
     * @param type $region
     * @param type $file
     * @param type $data
     * @param type $appned
     * @param type $theme 
     */
    private function _region($region, $file, $data=array(), $appned=true, $theme=false)
    {
        if (array_key_exists($region, $this->template_ar['region']))
        {
            if ($appned)
            {
                if ($theme)
                {
                    $path = $this->theme_path . $this->template;
                    $this->template_ar['region'][$region].= $this->CI->load->theme($file, $data, TRUE, $path);
                } else
                {
                    $this->template_ar['region'][$region].= $this->CI->load->view($file, $data, TRUE);
                }
            } else
            {
                if ($theme)
                {
                    $path = $this->theme_path . $this->template;
                    $this->template_ar['region'][$region] = $this->CI->load->theme($file, $data, TRUE, $path);
                } else
                {
                    $this->template_ar['region'][$region] = $this->CI->load->view($file, $data, TRUE);
                }
            }
        }
    }

    /**
     * private function to initialize of all the rgions
     */
    private function _initialize_region()
    {
        foreach ($this->template_region as $key => $val)
        {
            $this->_region($val['region'], $val['file'], $val['data'], $val['append'], $val['theme']);
        }
    }

    /**
     * private function to initialize al the medadata(css and js)
     */
    private function _initialize_metadata()
    {
        //all the prepend scripts and css
        if (isset($this->scripts['prepend']) && !empty($this->scripts['prepend']))
        {
            //css
            if (!empty($this->scripts['prepend']['styles']))
            {
                foreach ($this->scripts['prepend']['styles'] as $val)
                {
                    $this->template_ar['styles'].=$val;
                }
            }

            //scripts
            if (!empty($this->scripts['prepend']['scripts']))
            {
                foreach ($this->scripts['prepend']['scripts'] as $val)
                {
                    $this->template_ar['scripts'].=$val;
                }
            }
        }

        //all theme scripts and css
        if (isset($this->template_ar['metadata']) && !empty($this->template_ar['metadata']))
        {
            $path = $this->theme_path . $this->template;

            //css
            if (!empty($this->template_ar['metadata']['css']))
            {
                foreach ($this->template_ar['metadata']['css'] as $val)
                {
                    $this->template_ar['styles'].="<link rel='stylesheet' type='text/css' href='" . base_url() . $path . $val . "' />";
                }
            }

            //scripts
            if (!empty($this->template_ar['metadata']['js']))
            {
                foreach ($this->template_ar['metadata']['js'] as $val)
                {
                    $this->template_ar['scripts'].="<script src='" . base_url() . $path . $val . "' type='text/javascript'></script>";
                }
            }
        }

        //all the append scripts and css
        if (isset($this->scripts['append']) && !empty($this->scripts['append']))
        {
            //css
            if (!empty($this->scripts['append']['styles']))
            {

                foreach ($this->scripts['append']['styles'] as $val)
                {
                    $this->template_ar['styles'].=$val;
                }
            }

            //scripts
            if (!empty($this->scripts['append']['scripts']))
            {
                foreach ($this->scripts['append']['scripts'] as $val)
                {
                    $this->template_ar['scripts'].=$val;
                }
            }
        }
    }

    /**
     * to set render the whole out put to template
     */
    public function render($return = FALSE)
    {
        $path = $this->theme_path . $this->template;

        $this->_initialize_metadata();

        $this->_initialize_region();

        if ($this->layout != "")
        {
            return $this->CI->load->theme($this->layout, $this->template_ar, $return, $path);
        } else
        {
            print $this->template_ar['content'];
        }
    }

}

// END Template Class

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */