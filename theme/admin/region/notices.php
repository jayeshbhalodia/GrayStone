<?php if ($this->session->flashdata('error')): ?>
<div class="alert alert-error fade in">
        <a data-dismiss="alert" class="close">×</a>
	<?php echo $this->session->flashdata('error'); ?>
</div>
<?php endif; ?>

<?php if (validation_errors()): ?>
<div class="alert alert-error fade in">
        <a data-dismiss="alert" class="close">×</a>
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>

<?php if ( ! empty($messages['error'])): ?>
<div class="alert alert-error fade in">
        <a data-dismiss="alert" class="close">×</a>
	<?php echo $messages['error']; ?>
</div>
<?php endif; ?>

<?php if ($this->session->flashdata('notice')): ?>
<div class="alert alert-info fade in">
        <a data-dismiss="alert" class="close">×</a>
	<?php echo $this->session->flashdata('notice');?>
</div>
<?php endif; ?>

<?php if ( ! empty($messages['notice'])): ?>
<div class="alert alert-info fade in">
        <a data-dismiss="alert" class="close">×</a>
	<?php echo $messages['notice']; ?>
</div>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success fade in">
        <a data-dismiss="alert" class="close">×</a>
	<?php echo $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>

<?php if ( ! empty($messages['success'])): ?>
<div class="alert alert-success fade in">
        <a data-dismiss="alert" class="close">×</a>
	<?php echo $messages['success']; ?>
</div>
<?php endif; ?>