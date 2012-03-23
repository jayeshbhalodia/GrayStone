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
            'boostrap/bootstrap.css',
            'css/style.css',
            'css/jquery/jquery-ui.css'
            ),
        'js'=>array(
            'js/plugins/jquery.min.js',
            'js/plugins/jquery-ui.min.js',
            'boostrap/js/bootstrap-modal.js',
            'boostrap/js/bootstrap-alerts.js',
            'boostrap/js/bootstrap-dropdown.js',
            'boostrap/js/bootstrap-scrollspy.js',
            'boostrap/js/bootstrap-tabs.js',
            'js/functions.js', 
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