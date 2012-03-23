<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Variables model
 * 
 * @author	Graystone Dev Team
 * @Module	User
 */
class Menulink extends Admin_Controller
{

    /**
     * User Validation     
     */
    private $menulink_validation = array(
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
            'field' => 'path',
            'label' => 'Path',
            'rules' => 'required'
        ),
    );

    function __construct()
    {
        parent::__construct();

        //load model
        $this->load->model('menus_m');
        $this->load->model('menus_links_m');

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
        $this->data['module'] = "menu/admin/menulink";

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

    function order($id)
    {
     
        $this->template->append_metadata(module_path('menu', 'jquery.ui.nestedSortable.js', 'js/plugins/menuorder/'), $type = "js", false);
        $this->data['menu'] = get_menu('id', $id);
        $menu_link_params = array(
            'menu_name' => $this->data['menu']->machine_name,
            'attributes' => array('class' => 'sortable'),
            'options' => array(
                'tag' => 'ol',
                'link_wrapp_open_tag' => '<div><input type="checkbox" name="disabled[]" value="1"> &nbsp;',
                'link_wrapp_close_tag' => '
                    <span style="display:inline;float:right;"><a href="menu/admin/menulink/edit/{id}">Edit</a> | <a href="menu/admin/menulink/delete/{id}">Delete</a></span></div>',
            )
        );
        $this->data['menulinks'] = menu_links($menu_link_params);
        $this->data['menu_id'] = $id;

        $this->template->set_region('shortcuts', 'menu/admin/menulink/region/shortcuts', $this->data, FALSE);
        $this->template->set_content('admin/menulink/order', $this->data);
        $this->template->render();
    }

    function add($id="")
    {
        //render 404 message if id is not passed
        if (empty($id))
        {
            show_404('page');
        }

        $options = menu_links_dropdown();

        // Set the validation rules
        $this->form_validation->set_rules($this->menulink_validation);

        if ($this->form_validation->run() !== FALSE)
        {
            $post_value = $this->input->post();
            $selected_items = explode('-', $post_value['menu_items']);
            $post_value['menu_id'] = $selected_items[0];
            $post_value['parent_id'] = (!empty($selected_items[1])) ? $selected_items[1] : '0';
            unset($post_value['save'], $post_value['menu_items']);

            if ($last_id = $this->menus_links_m->insert($post_value))
            {
                if ($this->input->post('save') == "save")
                {
                    $this->session->set_flashdata('success', 'Menu Link added successfully.');
                    redirect($this->data['module'] . '/add/' . $id);
                }

                if ($this->input->post('save') == "save&exit")
                {
                    $this->session->set_flashdata('success', 'Menu Link added successfully.');
                    redirect($this->data['module'] . '/order/' . $id);
                }
            } else
            {
                $this->session->set_flashdata('error', 'Menu Link can not be created. Please try again !');
                redirect($this->data['module'] . '/add/' . $id);
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
        foreach ($this->menulink_validation as $rule)
        {
            $member->{$rule['field']} = set_value($rule['field']);
        }
        $member->menu_items = $id;

        // Render the view
        $this->data['member'] = & $member;
        $this->data['form_url'] = $this->data['module'] . '/add/' . $id;
        $this->data['menu_id'] = $id;
        $this->data['options'] = $options;

        $this->template->set_region('shortcuts', 'menu/admin/menulink/region/shortcuts', $this->data, FALSE);
        $this->template->set_content('admin/menulink/add', $this->data);
        $this->template->render();
    }

    public function edit($id)
    {
        if (empty($id))
        {
            $this->session->set_flashdata('error', 'Menu Link not found');
            redirect($this->data['module']);
        }

        $member = $this->menus_m->get($id);

        // Set the validation rules
        $this->form_validation->set_rules($this->menu_validation);

        if ($this->form_validation->run() !== FALSE)
        {
            $post_value = $this->input->post();
            unset($post_value['hdn_id']);
            unset($post_value['save']);

            if ($last_id = $this->menus_links_m->update($post_value, array(array('id', $id))))
            {
                if ($this->input->post('save') == "save")
                {
                    $this->session->set_flashdata('success', 'Menu Link updated successfully.');
                    redirect($this->data['module'] . '/edit/' . $id);
                }

                if ($this->input->post('save') == "save&exit")
                {
                    $this->session->set_flashdata('success', 'Menu Link updated successfully.');
                    redirect($this->data['module']);
                }
            } else
            {
                $this->session->set_flashdata('error', 'Menu Link updated can not be updated. Please try again !');
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
        $this->data['menu_id'] = $id;

        $this->template->set_region('shortcuts', 'menu/admin/menulink/region/shortcuts', $this->data, FALSE);
        $this->template->set_content('admin/menu/add', $this->data);
        $this->template->render();
    }

    /**
     * To call ajax to save menu on order page
     */
    function ajax_save_menulinks()
    {
        if ($this->is_ajax())
        {
            if ($this->input->post('menu-item'))
            {
                $post_values = $this->input->post();
                $menu_items_keys = array_keys($post_values['menu-item']);

                foreach ($menu_items_keys as $kyes => $val)
                {
                    $menu_item = array(
                        'parent_id' => ($post_values['menu-item'][$val] == "root") ? '0' : $post_values['menu-item'][$val],
                        'weight' => $kyes,
                    );
                    $this->menus_links_m->update($menu_item, array(array('id', $val)));
                }
            }
        } else
        {
            show_404('page');
        }
    }

}