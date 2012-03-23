<?php echo form_open($form_url, array('class' => 'form-horizontal')); ?>
<fieldset>
     <legend>Add Menu</legend>
    <?php echo isset($member->id) ? form_hidden('hdn_id', $member->id) : ""; ?>
    <div class="well">
        <div class="row">
            <div class="control-group">
                <label class="control-label" for="title">Titel :</label>
                <div class="controls">
                    <?php echo form_input(array('name' => 'title', 'value' => $member->title, 'class' => 'span4')); ?>
                    <?php echo $member->machine_name; ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="title">Discription :</label>
                <div class="controls">
                    <?php echo form_textarea(array('name'=>'discription','rows'=>'5','cols'=>'15','class' => 'span4','value'=>$member->discription)); ?>
                </div>
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