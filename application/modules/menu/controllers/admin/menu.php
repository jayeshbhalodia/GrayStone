<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Variables model
 * 
 * @author	Graystone Dev Team
 * @Module	User
 */
class Menu extends Admin_Controller
{
    /**
     * User Validation     
     */
    private $menu_validation = array(
        array(
            'field' => 'title',
            'label' => 'Titel',
            'rules' => 'required'
        ),
         array(
            'field' => 'discription',
            'label' => 'Discription',
            'rules' => ''
        ),
        array(
            'field' => 'machine_name',
            'label' => 'Password',
            'rules' => ''
        ),
    );
    
    function __construct()
    {
        parent::__construct();
        
        //load model
        $this->load->model('menus_m');

        //load library
        //load language
        //load config
        //set navigation
        $this->config->set_item('top_menu', 'user');
        $this->config->set_item('sub_menu', 'user');

        //set module information
        $module['module_name'] = "Menu";
        $module['module_description'] = "To manage system menus";

        //module name and default data to pass
        $this->data['module'] = "menu/admin/menu";

        //set default region
        $this->template->set_title('Menu');
        $this->template->set_region('module', 'region/module', $module, true, true);
        $this->template->set_region('shortcuts', 'menu/admin/region/shortcuts', $this->data);
    }

    function index()
    {
        $q = $this->menus_m->select();
        $q->fields('menus');

        //for pagination
        $this->pagination['total_rows'] = $q->countQuery()->execute()->fetchField();
        $this->pagination['base_url'] = base_url() . 'menu/admin/menu/index';
        $this->pagination['per_page'] = 10;

        $this->ajax_pagination->initialize($this->pagination);
        $this->data['pagination'] = $this->ajax_pagination->create_links();

        $q->range(0, $this->pagination['per_page']);
        if ($this->input->post('page'))
        {
            $q->range($this->input->post('page'), $this->pagination['per_page']);
        }

        $this->data['menus'] = $q->execute()->fetchAll();

        //unset the layout if we have an ajax request
        $this->is_ajax() ? $this->template->set_layout('') : '';

        $this->template->set_region('filters', 'menu/admin/region/filters', $this->data);
        $this->template->set_content('admin/menu/index', $this->data);
        $this->template->render();
    }
    
    function add()
    {
        // Set the validation rules
        $this->form_validation->set_rules($this->menu_validation);

        if ($this->form_validation->run() !== FALSE)
        {
            $post_value = $this->input->post();

            $post_value['new']=TRUE;
            unset($post_value['save']);

            if ($id = save_menu($post_value))
            {
                if ($this->input->post('save') == "save")
                {
                    $this->session->set_flashdata('success', 'Menu added successfully.');
                    redirect($this->data['module'] . '/add');
                }

                if ($this->input->post('save') == "save&exit")
                {
                    $this->session->set_flashdata('success', 'Menu added successfully.');
                    redirect($this->data['module']);
                }
            } else
            {
                $this->session->set_flashdata('error', 'Menu can not be created. Please try again !');
                redirect($this->data['module'] . '/add');
            }
        } else
        {
            // Dirty hack that fixes the issue of having to re-add all data upon an error
            if ($_POST)
            {
                $member = (object) $_POST;
            }
        }

        // Loop through each validation rule
        foreach ($this->menu_validation as $rule)
        {
            $member->{$rule['field']} = set_value($rule['field']);
        }

        // Render the view
        $this->data['member'] = & $member;
        $this->data['form_url'] = $this->data['module'] . '/add';

        $this->template->set_content('admin/menu/add', $this->data);
        $this->template->render();
    }
    
    public function edit($id)
    {
        if (empty($id))
        {
            $this->session->set_flashdata('error', 'Menu not found');
            redirect($this->data['module']);
        }

        $member = $this->menus_m->get($id);

        // Set the validation rules
        $this->form_validation->set_rules($this->menu_validation);

        if ($this->form_validation->run() !== FALSE)
        {
            $post_value = $this->input->post();
            $post_value['id']=$post_value['hdn_id'];
            unset($post_value['hdn_id']);
            unset($post_value['save']);

            if ($last_id = save_menu($post_value))
            {
                if ($this->input->post('save') == "save")
                {
                    $this->session->set_flashdata('success', 'Menu updated successfully.');
                    redirect($this->data['module'] . '/edit/' . $id);
                }

                if ($this->input->post('save') == "save&exit")
                {
                    $this->session->set_flashdata('success', 'Menu updated successfully.');
                    redirect($this->data['module']);
                }
            } else
            {
                $this->session->set_flashdata('error', 'Menu updated can not be updated. Please try again !');
                redirect($this->data['module'] . '/edit/' . $id);
            }
        } else
        {
            // Dirty hack that fixes the issue of having to re-add all data upon an error
            if ($_POST)
            {
                $member = (object) $_POST;
            }
        }

        // Render the view
        $this->data['member'] = & $member;
        $this->data['form_url'] = $this->data['module'] . '/edit/' . $id;

        $this->template->set_content('admin/menu/add', $this->data);
        $this->template->render();
    }
    
    /**
     *
     * @param type $id 
     */
    public function delete($id)
    {
        if (isset($id) && $id != '')
        {
            if ($this->menus_m->delete(array(array('id', $id))))
            {
                $this->session->set_flashdata('success', 'Menu deleted successfully');
                redirect($this->data['module']);
            }
        }

        $this->session->set_flashdata('error', 'Menu deleting error');
        redirect($this->data['module']);
    }
    
    /**
     * delete all selected users
     */
    public function delete_all()
    {
        if ($this->input->post('action_to') != false && is_array($this->input->post('action_to')) && count($this->input->post('action_to')) > 0)
        {
            unset($_POST['save']);

            $in_data = $this->input->post('action_to');

            if ($this->menus_m->delete_many($in_data))
            {
                $this->session->set_flashdata('success', 'Menu deleted successfully');
            } else
            {
                $this->session->set_flashdata('error', 'Menu deleting error');
            }
        } else
        {
            $this->session->set_flashdata('error', 'Menu deleting error');
        }

        redirect($this->data['module']);
    }

}