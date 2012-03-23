<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Html class
 */
class Tabs
{

    /**
     * to make tabse from the array
     * @param type $tabs
     * @return type
     * $tabs[]=array(
     *  'href'=>'',
     *  'active'=>'',
     *  'value'=>'',
     *  'disable'=>'true',
     * )
     */
    function tabs($tabs=array())
    {
        $html = "";
        if (!empty($tabs))
        {
            $html.="<ul>";
            foreach ($tabs as $key => $val)
            {
                if (isset($val['active']) && $val['active'] != "")
                {
                    $html.="<li id=" . $val['active'] . ">";
                } else
                {
                    $html.="<li>";
                }

                if (isset($val['disable']) && $val['disable'])
                {
                    $html.="<span>" . $val['value'] . "</span>";
                } else
                {
                    $html.="<a href=" . $val['href'] . ">" . $val['value'] . "</a>";
                }

                $html.="</li>";
            }
            $html.="</ul>";
        }

        return $html;
    }

    /**
     * to set curent tabs
     */
    public function current_tab($current_tab, &$tabs)
    {
        if (!empty($tabs))
        {
            $tabs[$current_tab]['active'] = 'active';
        }
    }

    /**
     * set id to all the tabs
     */
    public function set_id_tabs($id, &$tabs)
    {
        foreach ($tabs as $key => $val)
        {
            $tabs[$key]['href'] = $tabs[$key]['href'] . $id;
        }
    }

    /**
     * set disable others
     */
    public function set_disable($current_tabs, &$tabs)
    {
        foreach ($tabs as $key => $val)
        {
            if ($key != $current_tabs)
            {
                $tabs[$key]['disable'] = true;
            }
        }
    }

}