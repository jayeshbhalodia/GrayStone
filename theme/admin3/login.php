<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title><?php $title; ?></title>
   
   
        <?php
           echo $styles;
           echo $scripts;
        ?>
    <!-- Place CSS bug fixes for IE 7 in this comment -->
    <!--[if IE 7]>
    <style type="text/css" media="screen">
        #login-logo { margin: 15px auto 15px auto; }
        .input-email { margin: -24px 0 0 10px;}
        .input-password { margin: -30px 0 0 14px; }
        body#login #login-box input { height: 20px; padding: 10px 4px 4px 35px; }
        body#login{ margin-top: 14%;}
    </style>
    <![endif]-->

</head>

<body id="login">

<div id="left"></div>
<div id="right"></div>
<div id="top"></div>
<div id="bottom"></div>

    <div id="login-box">
        <header id="main">
            <div id="login-logo"></div>
        </header>
               
         <?php echo $region['notices']; ?>
           
        <?php echo form_open('admin/login'); ?>
            <ul>
                <li>
                    <input type="text" name="email" value="Email" onblur="if (this.value == '') {this.value = 'Email';}"  onfocus="if (this.value == 'Email') {this.value = '';}" />
                    <img class="input-email" src="<?php echo $this->config->item('admin_theme') ?>/img/admin/email-icon.png" alt="Email" />
                </li>
               
                <li>
                    <input type="password" name="password" value="Password" onblur="if (this.value == '') {this.value = 'Password';}"  onfocus="if (this.value == 'Password') {this.value = '';}"  />
                    <img class="input-password" src="<?php echo $this->config->item('admin_theme') ?>/img/admin/lock-icon.png" alt="Password" />
                </li>
               
                <li><center><input class="button" type="submit" name="submit" value="Login" /></center></li>
            </ul>
        <?php echo form_close(); ?>
    </div>
    <center>
        
    </center>
</body>
</html>