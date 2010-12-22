<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="<?= base_url()?>assets/stylesheet/style.css" rel="stylesheet" type="text/css" />
	<script language="javascript" type="text/javascript" src="<?= base_url()?>assets/javascript/jquery-1.3.2.min.js"></script>
	<script language="javascript" type="text/javascript" src="<?= base_url()?>assets/javascript/jquery.form.js"></script>
	
	<script src="<?= base_url()?>assets/javascript/cufon-yui.js" type="text/javascript"></script>
	<script src="<?= base_url()?>assets/javascript/Aller_400.font.js" type="text/javascript"></script>
	<script type="text/javascript">
		Cufon.replace('h1');
		Cufon.replace('h3');
	</script>
	<title>About this site</title>
</head>
<body>
<div id="wrap">
	<div id="header">
	</div>

	<div id="bodier">
		<div id="menu">
			<div id="head-navigation">
				<ul>
					<li id="nav-home"><?= anchor('','why me?'); ?></li>
					<li id="nav-message"><?= anchor('message','message board'); ?></li>
					<li id="nav-about-current"><?= anchor('about','about this site?'); ?></li>
					<li id="nav-logout"><?= anchor('logout','logout'); ?></li>					
				</ul>
			</div>
		</div>
		<div id="content">
			<?= print_notification() ?>
			<?= $this->load->view($view,$data,true) ?>
		</div>
	</div>
	
	<div id="footer">
	</div>

</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
