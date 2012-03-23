<?php

defined('BASEPATH') OR exit('No direct script access allowed.');

/**
 * CodeIgniter Date Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Karan Jilka
 */
// ------------------------------------------------------------------------

/**
 * to display ul or ol list
 * for e.g
 *  $item=array(
 * array('data'=>"item1",'attributes'=>array('class'=>'c1','id'=>'item1')),
 * array('data'=>"item2",'attributes'=>array('class'=>'c1','id'=>'item2')),
 * array('data'=>"item3",'attributes'=>array('class'=>'c1','id'=>'item3')),
 * array('data'=>"item4",'attributes'=>array('class'=>'c1','id'=>'item4')),
 * );
 * $attributes=array(
 * 'class'=>'c1',
 * 'id'=>'list_id'
 * )
 * $options=array(
 *   'tag'=>'', //ol or ul
 *  'items_open_tag'=>"",
 *  'items_close_tag'=>"", 
 *  'item_open_tag'=>"", 
 *  'item_close_tag'=>"", 
 * )
 * @param type $items 
 * @param type $attributes
 * @param type $options
 * @return string 
 */
function item_list($items=array(), $attributes=array(), $options=array())
{
    if(empty($options['tag'])){
        $options['tag']="ul";
    }
        
    $html = "";
    $cnt = 0;
    $class = "";

    //for opeingin tag
    if (!empty($options['items_open_tag']))
    {
        $html.=$options['items_open_tag'];
    }

    //displaying menu
    $html .= "<".$options['tag']." ";
    if (!empty($attributes))
    {
        foreach ($attributes as $key => $attribute)
        {
            $html .= " " . $key . "='" . $attribute."'";
        }
    }
    $html.=">";
    if (!empty($items))
    {
        foreach ($items as $item)
        {
            $cnt++;
            $class = "";

            if (!empty($item['data']))
            {
                $html.="<li";

                //for first element
                if ($cnt == 1)
                {
                    $class = 'first';
                }

                //for last element
                if (count($items) > 1)
                {
                    if ($cnt == count($items))
                    {
                        $class = 'last';
                    }
                }

                //for class odd or event
                if ($cnt % 2 == 0)
                {
                    $class.=" even";
                } else
                {
                    $class.=" odd";
                }

                if (!empty($item['attributes']))
                {
                    foreach ($item['attributes'] as $key => $attr)
                    {
                        if ($key == 'class')
                        {
                            $class .= " " . $attr;
                        } else
                        {
                            $html .= " " . $key . "='" . $attr."'";
                        }
                    }
                }
                $html.=' class="'.$class.'"';
                $html.=">";

                //for opeingin item tag
                if (!empty($options['item_open_tag']))
                {
                    $html.=$options['item_open_tag'];
                }

                $html.=$item['data'];

                //for closing item tag
                if (!empty($options['item_close_tag']))
                {
                    $html.=$options['item_close_tag'];
                }
                $html.="</li>";
            }
        }
    }
    $html .= "</".$options['tag'].">";

    //for closing tag
    if (!empty($options['items_close_tag']))
    {
        $html.=$options['items_close_tag'];
    }
    
    return $html;
}