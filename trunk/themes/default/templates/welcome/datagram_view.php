<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Welcome to CodeIgniter</title>
		<base href="<?php echo base_url() . 'themes/' . $theme . '/'; ?>" />
		<link rel="stylesheet" href="css/welcome.css" />
	</head>
	<body>
		<div id="container">
			<h1><span style="float:right"><a href="<?php echo base_url(); ?>">【返回首页】</a></span>欢迎来到Datagram功能介绍页面</h1>

			<div id="body">
				<h3>一、启动相关应用程序</h3>
				<p>1、启动memcache</p>
				<code>通过启动cmd命令窗口 <a href="javascript:void(0)">D:\memcached>memcached.exe -d start</a></code>

				<p>2、启动服务器进程（udp server）</p>
				<code>服务器进程链接：<a href="http://www.qb.com/codeigniter-demos/datagram/server/udp" target="_blank">http://www.qb.com/codeigniter-demos/datagram/server/udp</a></code>

				<p>3、启动客户端进程，发送数据到服务器</p>
				<code>客户端进程链接：<a href="http://www.qb.com/codeigniter-demos/datagram/client/udp" target="_blank">http://www.qb.com/codeigniter-demos/datagram/client/udp</a></code>

				<p>4、启动统计进程</p>
				<code>统计进程链接：<a href="javascript:void(0)" target="_blank">#</a></code>
			</div>

			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
		</div>

	</body>
</html>