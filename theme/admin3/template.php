<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="description" content="">
        <meta name="author" content="">

        <base href="<?php echo base_url(); ?>" />

        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le styles -->

        <!-- Le fav and touch icons -->
        <!--        <link rel="shortcut icon" href="images/favicon.ico">
                <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
                <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
                <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">-->

        <script type="text/javascript">
            //            var APPPATH_URI = "<?php //echo APPPATH_URI;              ?>";
            var SITE_URL = "<?php echo rtrim(site_url(), '/') . '/'; ?>";
            //            var BASE_URL = "<?php //echo BASE_URL;              ?>";
            //            var BASE_URI = "<?php //echo BASE_URI;              ?>";
            var DEFAULT_TITLE = "Weadnub";
            var DIALOG_MESSAGE = "Are you source you want to delete";
        </script>
<!--        <script type="text/javascript">pyro.apppath_uri="' . APPPATH_URI . '";pyro.base_uri="' . BASE_URI . '";</script>-->
        <?php echo $styles; ?>
        <?php echo $scripts; ?>

    </head>

    <body>

        <div class="topbar">
            <div class="topbar-inner">
                <div class="container-fluid">
                    <a class="brand" href="#">Project name</a>
                    <ul class="nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                    <p class="pull-right">Logged in as <a href="#">username</a></p>
                </div>
            </div>
        </div>

        <!-- header bottom -->
        <div class="container-fluid header-bottom">

            <?php echo $region['header']; ?>

            <div class="content right">
                <?php if (!empty($region['shortcuts'])): ?>
                    <?php echo $region['shortcuts']; ?>
                <?php endif; ?>

                <?php if (!empty($region['module'])): ?>
                    <?php echo $region['module']; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="container-fluid">

            <!-- left -->
            <div class="sidebar left">
                <div class="well">
                    <h5>Menu</h5>
                    <?php echo $region['navigation']; ?>
                </div>
            </div>

            <!-- right -->
            <div class="content right">
                <!-- Example row of columns -->
                <div class="row">
                    <div class="span19 maincontent">
                        <?php echo $region['notices']; ?>

                        <?php if (!empty($region['filters'])): ?>
                        <div class="well">
                            <?php echo $region['filters']; ?>
                        </div>
                        <?php endif; ?>
                        
                        <div id="content">
                        <?php echo $content; ?>
                        </div>
                    </div>
                </div>



                <footer>
                    <p>&copy; Company 2011</p>
                </footer>
            </div>
        </div>

    </body>
</html>