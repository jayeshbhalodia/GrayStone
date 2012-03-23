<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Variables model
 * 
 * @author	Graystone Dev Team
 * @Module	User
 */
class User extends Admin_Controller
{

    /**
     * User Validation     
     */
    private $user_validation = array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => ''
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|matches[passwrodconf]'
        ),
        array(
            'field' => 'passwrodconf',
            'label' => 'Password Confirm',
            'rules' => 'required'
        ),
        array(
            'field' => 'email_id',
            'label' => 'EMail Id',
            'rules' => 'required|valid_email'
        ),
    );

    public function __construct()
    {
        parent::__construct();

        //load model
        $this->load->model('users_m');

        //load library
        //load language
        //load config
        //set navigation
        $this->config->set_item('top_menu', 'user');
        $this->config->set_item('sub_menu', 'user');

        //set module information
        $module['module_name'] = "User";
        $module['module_description'] = "To manage users";

        //module name and default data to pass
        $this->data['module'] = "user/admin/user";

        //set default region
        $this->template->set_title('User');
        $this->template->set_region('module', 'region/module', $module, true, true);
        $this->template->set_region('shortcuts', 'user/admin/region/shortcuts', $this->data);
    }

    public function index()
    {
        $q = $this->users_m->select();
        $q->fields('users');

        if ($this->input->post('username'))
        {
            $q->condition('users.username', '%' . $this->input->post('username') . '%', 'LIKE');
        }

        //for pagination
        $this->pagination['total_rows'] = $q->countQuery()->execute()->fetchField();
        $this->pagination['base_url'] = base_url() . 'user/admin/user/index';
        $this->pagination['per_page'] = 5;

        $this->ajax_pagination->initialize($this->pagination);
        $this->data['pagination'] = $this->ajax_pagination->create_links();

        $q->range(0, 5);
        if ($this->input->post('page'))
        {
            $q->range($this->input->post('page'), 5);
        }

        $q->orderby('created', 'DESC');
        $this->data['users'] = $q->execute()->fetchAll();

        //unset the layout if we have an ajax request
        $this->is_ajax() ? $this->template->set_layout('') : '';

        $this->template->set_region('filters', 'user/admin/region/filters', $this->data);
        $this->template->set_content('admin/user/index', $this->data);
        $this->template->render();
    }

    public function add()
    {
        // Set the validation rules
        $this->form_validation->set_rules($this->user_validation);

        if ($this->form_validation->run() !== FALSE)
        {
            $post_value = $this->input->post();

            $post_value['created'] = time();
            $post_value['updated'] = time();
            $post_value['created'] = time();
            $post_value['ip_address'] = $_SERVER['REMOTE_ADDR'];

            unset($post_value['passwrodconf'], $post_value['save']);

            if ($id = $this->users_m->insert($post_value))
            {
                if ($this->input->post('save') == "save")
                {
                    $this->session->set_flashdata('success', 'User added successfully.');
                    redirect($this->data['module'] . '/add');
                }

                if ($this->input->post('save') == "save&exit")
                {
                    $this->session->set_flashdata('success', 'User added successfully.');
                    redirect($this->data['module']);
                }
            } else
            {
                $this->session->set_flashdata('error', 'User can not be created. Please try again !');
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
        foreach ($this->user_validation as $rule)
        {
            $member->{$rule['field']} = set_value($rule['field']);
        }

        // Render the view
        $this->data['member'] = & $member;
        $this->data['form_url'] = $this->data['module'] . '/add';

        $this->template->set_content('admin/user/add', $this->data);
        $this->template->render();
    }

    public function edit($id)
    {
        if (empty($id))
        {
            $this->session->set_flashdata('error', 'User not found');
            redirect($this->data['module']);
        }

        //override validation rules
        $this->user_validation[1]['rules'] = "matches[passwrodconf]";
        $this->user_validation[2]['rules'] = "";

        $member = $this->users_m->get($id);

        $member->password = "";
        $member->passwrodconf = "";

        // Set the validation rules
        $this->form_validation->set_rules($this->user_validation);

        if ($this->form_validation->run() !== FALSE)
        {
            $post_value = $this->input->post();
            $post_value['updated'] = time();

            unset($post_value['passwrodconf'], $post_value['hdn_id']);
            unset($post_value['save']);

            if ($last_id = $this->users_m->update($post_value, array(array('id', $id))))
            {
                if ($this->input->post('save') == "save")
                {

                    $this->session->set_flashdata('success', 'User updated successfully.');
                    redirect($this->data['module'] . '/edit/' . $id);
                }

                if ($this->input->post('save') == "save&exit")
                {
                    $this->session->set_flashdata('success', 'User updated successfully.');
                    redirect($this->data['module']);
                }
            } else
            {
                $this->session->set_flashdata('error', 'User updated can not be updated. Please try again !');
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

        $this->template->set_content('admin/user/add', $this->data);
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
            if ($this->users_m->delete(array(array('id', $id))))
            {
                $this->session->set_flashdata('success', 'User deleted successfully');
                redirect($this->data['module']);
            }
        }

        $this->session->set_flashdata('error', 'User deleting error');
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

            if ($this->users_m->delete_many($in_data))
            {
                $this->session->set_flashdata('success', 'User deleted successfully');
            } else
            {
                $this->session->set_flashdata('error', 'User deleting error');
            }
        } else
        {
            $this->session->set_flashdata('error', 'User deleting error');
        }

        redirect($this->data['module']);
    }

}