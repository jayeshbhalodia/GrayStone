<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Always force latest IE rendering engine & Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title><?php echo $title; ?></title>

        <base href="<?php echo base_url(); ?>" />

        <!-- Mobile Viewport Fix -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <!-- Grab Google CDNs jQuery, fall back if necessary -->
<!--        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>-->

<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

        <script type="text/javascript">
            //            var APPPATH_URI = "<?php //echo APPPATH_URI;      ?>";
            var SITE_URL = "<?php echo rtrim(site_url(), '/') . '/'; ?>";
            //            var BASE_URL = "<?php //echo BASE_URL;      ?>";
            //            var BASE_URI = "<?php //echo BASE_URI;      ?>";
            var DEFAULT_TITLE = "Weadnub";
            var DIALOG_MESSAGE = "Are you source you want to delete";
        </script>
<!--        <script type="text/javascript">pyro.apppath_uri="' . APPPATH_URI . '";pyro.base_uri="' . BASE_URI . '";</script>-->
        <?php echo $styles; ?>
        <?php echo $scripts; ?>
       
    </head>

    <body>
        <noscript>
        Luxechic requires that JavaScript be turned on for many of the functions to work correctly. Please turn JavaScript on and reload the page.
        </noscript>
        
        <div class="topbar">
            <div class="topbar-inner">
                <div class="container-fluid">
                    <a class="brand" href="#">Project name</a>

                    <ul class="nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li class="dropdown" data-dropdown="dropdown">
                            <a class="dropdown-toggle" href="#">Dropdown</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Secondary link</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Another link</a></li>
                            </ul>
                        </li>
                    </ul>
                    <p class="pull-right">Logged in as <a href="#">username</a></p>
                    <ul class="nav secondary-nav">
                        <li class="dropdown" data-dropdown="dropdown">
                            <a class="dropdown-toggle" href="#">Dropdown</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Secondary link</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Another link</a></li>
                            </ul>
                        </li>
                </div>
            </div>
        </div>

        <div class="row header-bottom">   
            <header id="main" class="span4">
                <div id="logo"></div>
            </header>
            <div class="span12 header-right">
                
                <?php if (!empty($region['shortcuts'])): ?>
                    <?php echo $region['shortcuts']; ?>
                <?php endif; ?>
                
                <?php if (!empty($region['module'])): ?>
                    <?php echo $region['module']; ?>
                <?php endif; ?>

                
            </div>   
        </div>    

        <div id="page-wrapper">
            <section id="sidebar">
                <?php echo $region['header']; ?>
                <?php echo $region['navigation']; ?>

                <footer>
                    Copyright &copy; 2011 Weadmin<br />
                    Rendered in {elapsed_time} sec. using {memory_usage}.
                </footer>
            </section>
            <section id="content-wrapper">

                <!--<?php if (!empty($region['module'])): ?>
                    <?php echo $region['module']; ?>
                <?php endif; ?>

                <?php if (!empty($region['shortcuts'])): ?>
                    <?php echo $region['shortcuts']; ?>
                <?php endif; ?>-->

                <?php if (!empty($region['filters'])): ?>
                    <?php echo $region['filters']; ?>
                <?php endif; ?>


                <?php echo $region['notices']; ?>

                <div id="content">
                    <?php echo $content; ?>
                </div>
            </section>
        </div>
    </body>
</html>