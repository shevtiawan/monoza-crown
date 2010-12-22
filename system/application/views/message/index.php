<div id="message-board">
<h1>Message Board</h1>
<?= form_open('message/create'); ?>

<? $data = array(
              'name'        => 'message_content',
              'id'          => 'message_content',
              //'value'       => 'johndoe',
			   'rows'     => 7,
			   'cols'     => 80
              
            );
echo form_textarea($data);
?>
<br />
<div id="button-message">
<button type="submit" class="giant_blue_button" id="submit_button">
    <div class="blue_button">
		<div class="blue_button_left"></div>
			Post Message
		<div class="blue_button_right"></div>
	</div>
</button>
</div>
<?
//echo form_submit('mysubmit', 'Post Message');
echo form_close();
?>

</div>

<div class="stream">

<? foreach ($messages as $message): ?>
	<div class="stream-item">
	<div class="property">
		<div class="username">
			<small><?= $message['username'] ?> at <?= $message['created_at'] ?></small>
		</div>
		<div class="action">
			<small><?= anchor('message/read/'.$message['id'],'read'); ?> | <?= anchor('message/update/'.$message['id'],'update'); ?> | <?= anchor('message/delete/'.$message['id'],'delete'); ?></small>
		</div>
	</div>
	<div class="message"> 
		<?= $message['content'] ?>
	</div>
	</div>
<? endforeach; ?>

</div>