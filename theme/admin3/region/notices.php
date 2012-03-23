<?php if ($this->session->flashdata('error')): ?>
<div class="alert-message error">
        <a class="close" href="#">×</a>
	<?php echo $this->session->flashdata('error'); ?>
</div>
<?php endif; ?>

<?php if (validation_errors()): ?>
<div class="alert-message error">
        <a class="close" href="#">×</a>
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>

<?php if ( ! empty($messages['error'])): ?>
<div class="alert-message error">
        <a class="close" href="#">×</a>
	<?php echo $messages['error']; ?>
</div>
<?php endif; ?>

<?php if ($this->session->flashdata('notice')): ?>
<div class="alert-message warning">
        <a class="close" href="#">×</a>
	<?php echo $this->session->flashdata('notice');?>
</div>
<?php endif; ?>

<?php if ( ! empty($messages['notice'])): ?>
<div class="alert-message warning">
        <a class="close" href="#">×</a>
	<?php echo $messages['notice']; ?>
</div>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
<div class="alert-message success">
        <a class="close" href="#">×</a>
	<?php echo $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>

<?php if ( ! empty($messages['success'])): ?>
<div class="alert-message success">
        <a class="close" href="#">×</a>
	<?php echo $messages['success']; ?>
</div>
<?php endif; ?>