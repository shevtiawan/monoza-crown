<script language="javascript" type="text/javascript">
$(document).ready(
    function(){
    
        $("#userlogin").ajaxForm({
            type: "POST",
            url: "<?= base_url()?>authentication/login",
            dataType: "json",
            data: "username="+$("#username").val()+"&password;="+$("#password").val(),
            success: updateLogin
        });
    
    }
);
function updateLogin(data) {
    $('#logged').html('');
    $('#logged').hide();
    
    $("#loginform").fadeIn("slow",
        function() {
             if (data.success == 'yes') {
                $('#logged').html(data.welcome).fadeIn("slow");
    			window.location = "<?= base_url()?>";
				
            }
            
            if (data.success == 'no') {
                $('.red-notification').html(data.message).fadeIn(500).delay(1000).fadeOut(1000);    
            }
        }
    );
    
}
</script>


<div id="logged"></div>

<div id="loginform">
	<div class="hello">
	<h1>Hello, Monoza...</h1>
	<h1>I'm andrisetiawan, junior web app developer.</h1>
	<h1>Thank you for stopping by.</h1>
	</div>
	<div class="hello2">
	<h4>But wait... Are you really Monoza?</h4>
	<h4>You should know the password, right? just to make sure. ;)</h4>
	</div>
	<?= form_open('authentication/login', array('id' => 'userlogin')); ?>
	<label for="username">Username</label>
	<? $data = array(
	              'name'        => 'username',
	              'id'          => 'username',
				  'class'		=> 'text_field',
	              //'value'       => 'johndoe',
	              'maxlength'   => '20',
	              'size'        => '30'
	            );
	echo form_input($data);
	?>
	
	<label for="password">Password</label>
	<? $data = array(
	              'name'        => 'password',
	              'id'          => 'password',
				  'class'		=> 'text_field',
	              //'value'       => 'johndoe',
	              'maxlength'   => '50',
	              'size'        => '30'
	            );

	echo form_password($data);
	?>
	<br />
	<button type="submit" class="giant_blue_button" id="submit_button">
        <div class="blue_button">
			<div class="blue_button_left"></div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Enter 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<div class="blue_button_right"></div>
		</div>
    </button>
	<?
	//echo form_submit('mysubmit', 'Login');
	echo form_close();
	?>
</div>