<?php
/**
 * main template
 */
$template['template'] = array(
    'region' => array(
        'buttons' => '',
        'header' => '',
        'navigation' => '',
        'pagination' => '',
        'sidebar' => '',
        'shortcuts'=>'',
        'module' => '',
        'footer' => '',
        'filters'=>'',
        'notices' => '',
    ),
    'metadata' => array(
        'css' => array(
            'css/style.css',
            'css/forms.css',
            'css/jquery/jquery-ui.css',
            'css/boostrap/bootstrap.css',
            ),
        'js'=>array(
            'js/jquery/jquery.min.js',
            'js/jquery/jquery-ui.min.js',
            'js/jquery/jquery.livequery.min.js',
            'js/jquery/jquery.uniform.min.js',           
            'js/functions.js', 
            'js/filter.js',
            'css/boostrap/js/bootstrap-dropdown.js',
        )
    ),
);

/**
 * login template
 */
$template['login'] = array(
    'region' => array(
        'notices' => '',
    ),
    'metadata' => array(
        'css' => array(
            'css/style.css',
            ),
        'js'=>array(
            'js/jquery/jquery.js',
            'js/login.js',
        )
    ),
);