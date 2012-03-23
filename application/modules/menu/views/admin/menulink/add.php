<?php echo form_open($form_url, array('class' => 'form-horizontal')); ?>
<fieldset>
    <legend>Add Menu Link</legend>
    <?php echo isset($member->id) ? form_hidden('hdn_id', $member->id) : ""; ?>
    <div class="well">
        <div class="row">
            <div class="control-group">
                <label class="control-label" for="title">Titel : </label>
                <?php echo form_input(array('name' => 'title', 'value' => $member->title, 'class' => 'span4')); ?>
            </div>
            <div class="control-group">
                <label class="control-label" for="path">Path : </label>
                <?php echo form_input(array('name' => 'path', 'value' => $member->path, 'class' => 'span4')); ?>
            </div>
            <div class="control-group">
                <label class="control-label" for="discription">Discription :</label>
                <?php echo form_textarea(array('name'=>'discription','rows'=>'5','cols'=>'15','class' => 'span4','value'=>$member->discription)); ?>
            </div>
            <div class="control-group">
                <label class="control-label" for="path">Menu Items : </label>
                <?php echo form_dropdown('menu_items',$options,$member->menu_items,'class="span4" size="8"'); ?>
            </div>
        </div>
    </div> 
    <hr>
    <div class="well">
        <button class="btn primary" name="save" type="submit" value="save">Save</button>
        <button class="btn primary" name="save" type="submit" value="save&exit">Save & Exit</button>
        <?php echo anchor($module, 'Cancel', array('class' => "btn")); ?>
    </div>
</fieldset>

<?php echo form_close(); ?> 