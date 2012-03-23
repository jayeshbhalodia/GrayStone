<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <base href="<?php echo base_url(); ?>" />

        <!-- Le styles -->

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <!--        <link rel="shortcut icon" href="assets/ico/favicon.ico">
        
                <link rel="apple-touch-icon" href="assets/ico/apple-touch-icon.png">
                <link rel="apple-touch-icon" sizes="72x72" href="assets/ico/apple-touch-icon-72x72.png">
                <link rel="apple-touch-icon" sizes="114x114" href="assets/ico/apple-touch-icon-114x114.png">-->
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }
        </style>
        <script type="text/javascript">
            var SITE_URL = "<?php echo rtrim(site_url(), '/') . '/'; ?>";
        </script>
        <?php echo $styles; ?>
        <?php echo $scripts; ?>

    </head>

    <body>

        <!-- header bottom -->
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">

                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Project name</a>
                    <div class="nav-collapse">
                        <ul class="nav">

                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                        <p class="navbar-text pull-right">Logged in as <a href="#">username</a></p>
                    </div>/.nav-collapse 

                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                
                <div class="span2">
                    <?php echo $region['navigation']; ?>
                </div><!--/span-->


                <div class="span10 main-content">

                    <?php if (!empty($region['module'])): ?>
                        <?php echo $region['module']; ?>
                    <?php endif; ?>

                    <?php if (!empty($region['shortcuts'])): ?>
                        <?php echo $region['shortcuts']; ?>
                    <?php endif; ?>

                    <?php if (!empty($region['filters'])): ?>
                        <?php echo $region['filters']; ?>
                    <?php endif; ?>

                     <?php echo $region['notices']; ?>
                    
                    <div id="content">
                        <?php echo $content; ?>
                    </div>


                </div><!--/span-->
            </div><!--/row-->

            <hr>

            <footer>
                <p>&copy; Company 2012</p>
            </footer>

        </div><!--/.fluid-container-->



    </body>
</html>