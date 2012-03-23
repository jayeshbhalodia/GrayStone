<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html> 

    <!-- Mirrored from www.gallyapp.com/tf_themes/weadmin/dashboard_black.html by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 31 Dec 2003 19:06:20 GMT -->
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- Website Title --> 
        <title><?php echo $title; ?></title>

        <?php
        echo $styles;
        echo $scripts;
        ?>
    </head>
    <body>
        <div class="content_wrapper">

            <!-- Begin header -->
            <?php echo $region['header']; ?>
            <!-- End header -->

            <!-- Begin left panel -->
            <?php echo $region['menu']; ?>
            <!-- End left panel -->


            <!-- Begin content -->
            <div id="content">
                <div id="shortcuts">
                    <h6>Shortcuts</h6>
                        <?php echo $region['shorcuts'] ?>
                    </div>
                
                <!-- messages -->
                <?php if ($this->session->flashdata('warning') != ""): ?>
                    <div class="alert_warning">
                        <?php echo $this->session->flashdata('warning'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('info') != ""): ?>
                    <div class="alert_info">
                        <?php echo $this->session->flashdata('info'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('success') != ""): ?>
                    <div class="alert_success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('error') != ""): ?>
                    <div class="alert_error">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="inner">
                    <?php echo $content; ?>
                </div>

                <br class="clear"/><br class="clear"/>


                <!-- Begin footer -->
                <div id="footer">
                    &copy; Copyright 2010 by Your Company
                </div>
                <!-- End footer -->


            </div>
            <!-- End content -->
        </div>
    </body>

    <!-- Mirrored from www.gallyapp.com/tf_themes/weadmin/dashboard_black.html by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 31 Dec 2003 19:07:39 GMT -->
</html>