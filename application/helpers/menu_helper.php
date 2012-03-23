<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Code Igniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		K
 * @copyright	Copyright (c) 2006, pMachine, Inc.
 * @license		http://www.codeignitor.com/user_guide/license.html
 * @link			http://www.codeigniter.com
 * @since           Version 1.0
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * Code Igniter Asset Helpers
 *
 * @package		CodeIgniter
 * @subpackage          Helpers
 * @category		Helpers
 * @author              Karan Jilka 
 */
// ------------------------------------------------------------------------

/**
 *
 * @param type $variables 
 * array(
 *   'new'=>TRUE,
 *   'title'=>'', 
 * )
 * for update
 * array(
 *   'id'=>,
 *   'title'=>'', 
 * )
 */
function save_menu($variables=array())
{

    $mid = FALSE;

    if (empty($variables))
    {
        return FALSE;
    }

    $variables['machine_name'] = explode(' ', strtolower($variables['title']));
    $variables['machine_name'] = implode('_', $variables['machine_name']);
    if (!empty($variables['new']) && $variables['new'])
    {
        $query = db_select('menus');
        $query->condition('machine_name', $variables['machine_name']);
        $cnt = $query->countQuery()->execute()->fetchField();
        if ($cnt == 0)
        {
            $mid = db_insert('menus')
                    ->fields(
                            array(
                                'title' => $variables['title'],
                                'machine_name' => $variables['machine_name'],
                                'discription' => $variables['discription']
                            )
                    )
                    ->execute();
        }
    } else
    {
        $mid = db_update('menus')
                ->fields(array(
                    'title' => $variables['title'],
                    'machine_name' => $variables['machine_name'],
                    'discription' => $variables['discription']
                ))
                ->condition('id', $variables['id'])
                ->execute();
    }

    return $mid;
}

function get_menu($field, $value)
{
    $menu = db_select('menus');
    $menu->fields('menus');
    $menu->condition($field, $value);
    $menu = $menu->execute()->fetch();

    return $menu;
}

/**
 * to display menu form the database
 * $variblaes=array(
 *  'menu_name'=>"",  //machine name of the menu
 *  'attributes'=>array() //array of the attriebutes 
 *                        for e.g array('class'=>'menu','id'=>'menu_id')
 *  'options'=>array(
 *        'tag'=>""//ul or ol
 *        'items_open_tag'=>"" //wrappeer tab for e.g <div class="items">
 *        'items_close_tag'=>"" //wrappeer tab for e.g </div>
 *        'item_open_tag'=>"" //wrappeer for items tab for e.g <span class="classname">
 *        'item_close_tag'=>"" //wrappeer for items tab for e.g </span>
 *        'sortable'=>"false" //default is false
 *        'link_wrapp_open_tag'=>"",
 *        'link_wrapp_close_tag'=>""
 *   )
 * )
 * 
 * @param type $varibales 
 */
function menu_links($varibales=array())
{
    $menu = get_menu('machine_name', $varibales['menu_name']);

    if (!empty($menu))
    {
        //for link wrappers
        if (empty($varibales['options']['link_wrapp_open_tag']))
        {
            $varibales['options']['link_wrapp_open_tag'] = "";
        }
        if (empty($varibales['options']['link_wrapp_open_tag']))
        {
            $varibales['options']['link_wrapp_close_tag'] = "";
        }

        $query = db_select('menus_links', 'ml');
        $query->fields('ml');
        $query->condition('menu_id', $menu->id);
        $query->condition('parent_id', 0);
        $query->orderBy('ml.weight');
        $result = $query->execute()->fetchAll();

        if (!empty($result))
        {
            foreach ($result as $ml)
            {
                //to search and replace tags
                $search = array('{title}', '{id}');
                $replace = array($ml->title, $ml->id);
                $link_wrapp_open_tag = str_replace($search, $replace, $varibales['options']['link_wrapp_open_tag']);
                $link_wrapp_close_tag = str_replace($search, $replace, $varibales['options']['link_wrapp_close_tag']);

                $list[] = array(
                    'data' => $link_wrapp_open_tag . '<a href="' . $ml->title . '">' . $ml->title . '</a>' . $link_wrapp_close_tag . _sub_menu_links($ml->id, $varibales),
                    'attributes' => array('id' => 'menu-item-' . $ml->id, 'class' => 'menu-item')
                );
            }

            //for attributes
            $attributes = (!empty($varibales['attributes'])) ? $varibales['attributes'] : array();
            if (!empty($attributes['class']))
            {
                $attributes['class'] = $menu->machine_name . " " . $attributes['class'];
            } else
            {
                $attributes['class'] = $menu->machine_name;
            }

            //for options
            $options = (!empty($varibales['options'])) ? $varibales['options'] : array();

            return item_list($list, $attributes, $options);
        }
    }
}

/**
 * To get sublinks of parent menu
 * @param type $parent_id
 * @param type $varibales
 * @return type 
 */
function _sub_menu_links($parent_id, $varibales=array())
{
    $query = db_select('menus_links', 'ml');
    $query->fields('ml');
    $query->condition('parent_id', $parent_id);
    $query->orderBy('ml.weight');
    $result = $query->execute()->fetchAll();

    //for link wrappers
    if (empty($varibales['options']['link_wrapp_open_tag']))
    {
        $varibales['options']['link_wrapp_open_tag'] = "";
    }
    if (empty($varibales['options']['link_wrapp_open_tag']))
    {
        $varibales['options']['link_wrapp_close_tag'] = "";
    }

    if (!empty($result))
    {
        foreach ($result as $ml)
        {
            //to search and replace tags
            $search = array('{title}', '{id}');
            $replace = array($ml->title, $ml->id);
            $link_wrapp_open_tag = str_replace($search, $replace, $varibales['options']['link_wrapp_open_tag']);
            $link_wrapp_close_tag = str_replace($search, $replace, $varibales['options']['link_wrapp_close_tag']);

            $list[] = array(
                'data' => $link_wrapp_open_tag . '<a href="' . $ml->title . '">' . $ml->title . '</a>' . $link_wrapp_close_tag . _sub_menu_links($ml->id, $varibales),
                'attributes' => array('id' => 'menu-item-' . $ml->id, 'class' => 'menu-item')
            );
        }

        //for attributes
        $attributes = (!empty($varibales['attributes'])) ? $varibales['attributes'] : array();

        //for options
        $options = (!empty($varibales['options'])) ? $varibales['options'] : array();

        return item_list($list, $attributes, $options);
    }
}

/**
 * To get menu links dropdown
 * @return type 
 */
function menu_links_dropdown()
{
    $output = array();

    $query = db_select('menus');
    $query->fields('menus');
    $query->orderBy('menus.id');
    $menus = $query->execute()->fetchAll();

    foreach ($menus as $menu)
    {
        $output[$menu->title][$menu->id] = "Parent";
        foreach (_parent_menu_links($menu->id) as $parent_menu_link)
        {
            $output[$menu->title][$menu->id . "-" . $parent_menu_link->id] = $parent_menu_link->title;
            $output[$menu->title] = $output[$menu->title] + _sub_menu_links_dropdown($parent_menu_link->id, $menu->id, '2');
        }
    }

    return $output;
}

/**
 * To get sub links dropdown
 * @param type $parent_id
 * @param type $menu_id
 * @param type $hayphins
 * @return type 
 */
function _sub_menu_links_dropdown($parent_id, $menu_id, $hayphins)
{
    $output = array();
    $query = db_select('menus_links', 'ml');
    $query->fields('ml');
    $query->condition('parent_id', $parent_id);
    $query->orderBy('ml.weight');
    $links = $query->execute()->fetchAll();

    foreach ($links as $link)
    {
        $output[$menu_id . "-" . $link->id] = str_repeat("-", $hayphins) . $link->title;
        $hayphins = $hayphins + 2;
        $output = $output + _sub_menu_links_dropdown($link->id, $menu_id, $hayphins);
    }

    return $output;
}

/**
 * To get only parent menu of from particular menu_id
 * @param type $menu_id
 * @return array 
 */
function _parent_menu_links($menu_id)
{
    $output = array();

    $query = db_select('menus_links', 'ml');
    $query->fields('ml');
    $query->condition('menu_id', $menu_id);
    $query->condition('parent_id', '0');
    $query->orderBy('ml.weight');
    $parent_menu_links = $query->execute()->fetchAll();

    return $parent_menu_links;
}

function menu_links_array($varibales)
{
    $menu = get_menu('machine_name', $varibales['menu_name']);

    if (!empty($menu))
    {
        $query = db_select('menus_links', 'ml');
        $query->fields('ml');
        $query->condition('menu_id', $menu->id);
        $query->condition('parent_id', 0);
        $query->orderBy('ml.weight');
        $result = $query->execute()->fetchAll();

        if (!empty($result))
        {
            foreach ($result as $ml)
            {
                $list[] = array(
                    'data' => '<a href="' . $ml->title . '">' . $ml->title . '</a>' . _sub_menu_links($ml->id, $varibales),
                );
            }

            return $list;
        }
    }
}