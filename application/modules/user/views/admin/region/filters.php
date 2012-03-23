<!--<div class="filter">
    <?php echo form_open('', array('id' => 'search')); ?>
    <div class="16">
        <input type ="hidden" value="<?php echo $module ?>" id="page_path" />
        Username :
        <?php echo form_input(array('name' => 'username', 'class' => 'span3')); ?>

        <?php echo form_input(array('type' => 'button', 'name' => 'search', 'value' => 'Search', 'class' => 'search btn primary')); ?>
        <?php echo anchor(current_url(), lang('buttons.cancel'), 'class="cancel btn primary"'); ?>


    </div>
    <?php echo form_close(); ?>
</div>-->

<div id="filter" class="filter collapse out">
    <?php echo form_open('', array('id' => 'search', 'class' => 'well form-inline')); ?>
    <input type ="hidden" value="<?php echo $module ?>" id="page_path" />
    Username :
    <?php echo form_input(array('name' => 'username', 'class' => 'span3')); ?>

    <?php echo form_input(array('type' => 'button', 'name' => 'Search', 'value' => 'Search', 'class' => 'search btn')); ?>
    <?php echo anchor(current_url(), lang('buttons.cancel'), 'class="btn"'); ?>
    <?php echo form_close(); ?>
</div>