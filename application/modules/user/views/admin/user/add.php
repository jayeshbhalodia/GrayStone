
<?php echo form_open($form_url, array('class' => 'form-horizontal')); ?>
<fieldset>
    <legend>Add User</legend>
    <?php echo isset($member->id) ? form_hidden('hdn_id', $member->id) : ""; ?>
    <div class="well">
        <div class="row">
            <div class="control-group">
                <label class="control-label" for="username">Username :</label>
                <div class="controls">
                    <?php echo form_input(array('name' => 'username', 'value' => $member->username, 'class' => 'span4')); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="username">Email Id :</label>
                <div class="controls">
                    <?php echo form_input(array('name' => 'email_id', 'value' => $member->email_id, 'class' => 'span4')); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="xlInput">Password :</label>
                <div class="controls">
                    <?php echo form_password(array('name' => 'password', 'value' => $member->password, 'class' => 'span4')); ?>
                </div> 
            </div>
            <div class="control-group">
                <label class="control-label" for="xlInput">Confirm Password :</label>
                <div class="controls">
                    <?php echo form_password(array('name' => 'passwrodconf', 'value' => $member->passwrodconf, 'class' => 'span4')); ?>
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