<?php

$items = array(
    array('data' => '<a href="#"><i class="icon-home icon-white"></i> Home</a>', 'attributes' => array('class' => 'active')),
    array('data' => '<i class="icon-book"></i>Content Manage', 'attributes' => array('class' => 'nav-header')),
    array('data' => '<a href="#">Pages</a>'),
    array('data' => '<i class="icon-user"></i>User', 'attributes' => array('class' => 'nav-header')),
    array('data' => '<a href="'.base_url().'user/admin/user">Users</a>'),
    array('data' => '<i class="icon-th-list"></i>Menu', 'attributes' => array('class' => 'nav-header')),
    array('data' => '<a href="'.base_url().'menu/admin/menu">Menus</a>'),
);
$attributes = array(
    'class' => 'nav nav-list'
);
$options = array(
    'items_open_tag' => '<div style="padding: 8px 0;" class="well">',
    'items_close_tag' => '</div>',
);

echo item_list($items, $attributes, $options);

?>