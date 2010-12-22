<script type="text/javascript">
$('#username').keydown(function() {
  $('#alamat').value = ('#username').value;
});
</script>

<?php echo validation_errors(); ?>

	<h2>Register</h2>
	<?= form_open('authentication/register'); ?>

	<h3>Nama lengkap</h3>
	<? $data = array(
	              'name'        => 'fullname',
	              'id'          => 'fullname',
	              //'value'       => 'johndoe',
	              'maxlength'   => '30',
	              'size'        => '30'
	            );
	echo form_input($data);
	?>

	<h3>Username</h3>
	<? $data = array(
	              'name'        => 'username',
	              'id'          => 'username',
	              //'value'       => 'johndoe',
	              'maxlength'   => '20',
	              'size'        => '30'
	            );
	echo form_input($data);
	?>
	<br /><small>Profil anda akan dapat diakses melalui alamat http://bolania.com/username_anda <span id="ada"></span></small>
	<h3>Email</h3>
	<? $data = array(
	              'name'        => 'email',
	              'id'          => 'email',
	              //'value'       => 'johndoe',
	              'maxlength'   => '50',
	              'size'        => '30'
	            );

	echo form_input($data);
	?>
	<br />
	<?
	echo form_submit('mysubmit', 'Daftar sekarang!');
	echo form_close();
	?>