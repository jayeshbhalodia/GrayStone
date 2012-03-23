<h4>Add User</h4>

<?php echo form_open($form_url, array('class' => 'crud')); ?>
<fieldset>
    <?php echo isset($member->id)?form_hidden('hdn_id',$member->id):""; ?>
    <div class="row">
        <div class="clearfix">
            <label for="username">Username :</label>
            <div class="input">
                <?php echo form_input(array('name' => 'username','value'=>$member->username,'class' => 'span4')); ?>
            </div>
        </div>
        <div class="clearfix">
            <label for="username">Email Id :</label>
            <div class="input">
                <?php echo form_input(array('name' => 'email_id','value'=>$member->email_id, 'class' => 'span4')); ?>
            </div>
        </div>
        <div class="clearfix">
            <label for="xlInput">Password :</label>
            <div class="input">
                <?php echo form_password(array('name' => 'password','value'=>$member->password, 'class' => 'span4')); ?>
            </div> 
        </div>
        <div class="clearfix">
            <label for="xlInput">Confirm Password :</label>
            <div class="input">
                <?php echo form_password(array('name' => 'passwrodconf','value'=>$member->passwrodconf, 'class' => 'span4')); ?>
            </div> 
        </div>
    </div> 
    <hr>
    <div class="well">

        <button class="btn primary" name="save" type="submit" value="save">Save</button>
        <button class="btn primary" name="save" type="submit" value="save&exit">Save & Exit</button>
        <?php echo anchor($module,'Cancel',array('class'=>"btn")); ?>
    </div>
</fieldset>

<?php echo form_close(); ?> 