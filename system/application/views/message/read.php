<div class="stream">

	<div class="stream-item">
	<div class="property">
		<div class="username">
			<small><?= $message['username'] ?> at <?= $message['created_at'] ?></small>
		</div>
		<div class="action">
			<small><?= anchor('message/update/'.$message['id'],'update'); ?> | <?= anchor('message/delete/'.$message['id'],'delete'); ?></small>
		</div>
	</div>
	<div class="message"> 
		<?= $message['content'] ?>
	</div>
	</div>

</div>
