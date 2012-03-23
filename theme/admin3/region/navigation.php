<?php
$menu_html = '';

//menu array
$menu = array(
    'dashboard' => array('url' => base_url(), 'value' => 'Dashboard'),
    'block' => array('url' => base_url(), 'value' => 'Block'),
    'content' => array(
        'url' => '#',
        'value' => 'Content',
        'sub' => array(
            'page' => array('url' => '#', 'value' => 'Page'),
            'menu' => array('url' => '#', 'value' => 'Menu'),
        )
    ),
    'user' => array('url' => 'user/admin/user', 'value' => 'User'),
);

// display menu
foreach ($menu as $key => $val)
{
    $current_top = "";
    if ($this->config->item('top_menu') == $key)
    {
        $current_top = "current";
    }

    if (isset($val['sub']))
    {
        $menu_html.="<li>";
        $menu_html.="<a class='top-link " . $current_top . "' href='" . $val['url'] . "'>" . $val['value'] . "</a>";
        $menu_html.="<ul>";
        foreach ($val['sub'] as $key_sub => $val_sub)
        {
            $current_sub="";
            if ($this->config->item('sub_menu') == $key_sub)
            { 
                $current_sub = "current";
            }

            $menu_html.="<li><a class='" . $current_sub . "' href='" . $val_sub['url'] . "'>" . $val_sub['value'] . "</a></li>";
        }
        $menu_html.="</ul>";
        $menu_html.="</li>";
    } else
    {
        $menu_html.="<li><a class='top-link " . $current_top . " no-submenu' href='" . $val['url'] . "'>" . $val['value'] . "</a></li>";
    }
}
?>

<nav id="main-nav">
    <ul>
        <?php print $menu_html; ?>
    </ul>
</nav>
 
