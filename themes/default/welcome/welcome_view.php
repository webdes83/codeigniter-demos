<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Welcome to CodeIgniter</title>
		<base href="<?php echo base_url().'themes/'.$theme.'/'; ?>" />
		<link rel="stylesheet" href="css/welcome.css" />
	</head>
	<body>
		<div id="container">
			<h1>Welcome to CodeIgniter!</h1>

			<div id="body">
				<p>本系统以实现了View的调度</p>

				<p>If you would like to edit this page you'll find it located at:</p>
				<code>Controller:	<?php echo $controller; ?></code>

				<p>The corresponding controller for this page is found at:</p>
				<code>View:	<?php echo __FILE__; ?></code>

				<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="<?php echo base_url(); ?>/user_guide/">User Guide</a>.</p>
			</div>

			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
		</div>

	</body>
</html>