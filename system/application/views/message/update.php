<h1>Update Message</h1>
<?= form_open('message/update_process'); ?>
<?= form_hidden('id', $message['id']); ?>

<? $data = array(
              'name'        => 'message_content',
              'id'          => 'message_content',
              'value'       => $message['content'],
			   'rows'     => 5,
			   'cols'     => 60
              
            );
echo form_textarea($data);
?>
<br />
<?
echo form_submit('mysubmit', 'Update');
echo form_close();
?>