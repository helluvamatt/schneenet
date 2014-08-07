<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width" />
<title>SCHNEENET Internet Solutions</title>
<link rel="icon" type="image/png" href="assets/img/icon_32x32.png" />
<link rel="shortcut icon" type="image/png" href="assets/img/icon_48x48.png" />
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="assets/css/common.css" />
</head>
<body data-spy="scroll" data-target="#site_navigation">
	<nav id="site_navigation" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#site-navbar-collapse">
				<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><img src="assets/img/icon_32x32.png" alt="logo" class="logo" />SCHNEENET</a>
		</div>
		<div class="collapse navbar-collapse" id="site-navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a href="#about"><span class="fa fa-info-circle"></span>&nbsp;About</a></li>
				<li><a href="#projects"><span class="fa fa-briefcase"></span>&nbsp;Projects</a></li>
				<li><a href="#contact"><span class="fa fa-envelope"></span>&nbsp;Contact</a></li>
			</ul>
		</div>
	</nav>

	<!-- Section 1 -->
	<section id="about" data-speed="6" data-type="background">
		<div class="container">
			<div class="row-fluid">
				<div class="col-md-8 col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h1 class="panel-title"><span class="fa fa-info-circle"></span>&nbsp;About</h1>
						</div>
						<div class="panel-body">
							<h5><strong>SCHNEENET</strong></h5>
							<p>SCHNEENET Internet Services is the brainchild of Matt Schneeberger. We provide consulting, support, and customized solutions for the web, mobile devices, IT, and networking. We provide Internet connectivity, storage, and media services to Matt's household.</p>
							<h5><strong>Matt Schneeberger</strong></h5>
							<p>Matt was educated at the University of Central Oklahoma. He holds a Bachelor's Degree in Computer Science. Matt resides in Edmond, Oklahoma with his wife, Bethany, and two kids Lilli and Landry.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-xs-12">
					<img src="assets/img/matt.jpg" alt="mugshot" class="img-thumbnail" />
				</div>
			</div>
		</div>
	</section>

	<section id="projects" data-speed="4" data-type="background">
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title"><span class="fa fa-briefcase"></span>&nbsp;Projects</h1>
				</div>
				<div class="panel-body">
<?php
$apps_json = file_get_contents('../data/apps/apps.json');
$apps = json_decode($apps_json, TRUE);
if (count($apps) > 0)
{
?>
					<ul class="media-list">
<?php
	foreach ($apps as $app)
	{
?>
						<li class="media">
<?php 
		if (array_key_exists('icon', $app))
		{
?>
							<a class="pull-left" href="<?php echo $app['url']; ?>">
								<img class="media-object" src="<?php echo $app['icon']; ?>" alt="icon">
							</a>
<?php 
		}
?>
							<div class="media-body">
								<h4 class="media-heading"><a href="<?php echo $app['url']; ?>"><?php echo $app['title']; ?></a></h4>
								<p><?php echo $app['description']; ?></p>
<?php 
if (array_key_exists('tags', $app) && is_array($app['tags']))
{
	echo "\n<p>\n";
	foreach ($app['tags'] as $tag)
	{
		$icon_html = '';
		if (array_key_exists('icon', $tag))
		{
			$icon = explode(':', $tag['icon']);
			if ($icon[0] == 'fa')
			{
				$icon_html = '<i class="fa fa-' . $icon[1] . '"></i>&nbsp;';
			}
			else if ($icon[0] == 'img')
			{
				$icon_html = '<img src="' . $icon[1] . '" alt="icon">';
			}
		}
		
		$link_open_html = '';
		$link_close_html = '';
		
		if (array_key_exists('url', $tag))
		{
			$link_open_html = '<a href="' . $tag['url'] . '">';
			$link_close_html = '</a>';
		}
		
		echo $link_open_html . "<span class=\"label label-primary tag\">" . $icon_html . $tag['name'] . "</span>" . $link_close_html . "\n";
		
		
	}
	echo "</p>\n\n";
}
?>
							</div>
						</li>
<?php
	}
?>
					</ul>
<?php
}
else
{
?>
					<div class="alert alert-warning">
						<h4><strong>Coming Soon</strong></h4>
						<p>There are no public projects available at this time.</p>
					</div>
<?php
}
?>
				</div>
			</div>
		</div>
	</section>

	<section id="contact" data-speed="2" data-type="background">
		<div class="container">
			<div class="row-fluid">
				<div class="col-lg-offset-4 col-md-offset-3 col-sm-offset-2 col-lg-4 col-md-6 col-sm-8 col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h1 class="panel-title"><span class="fa fa-envelope"></span>&nbsp;Contact</h1>
						</div>
						<div class="panel-body">
							<ul class="fa-ul">
								<li><i class="fa-li fa fa-envelope"></i><a href="mailto:matt@schneenet.com">matt@schneenet.com</a></li>
								<li><i class="fa-li fa fa-github-square"></i><a href="http://github.com/helluvamatt">helluvamatt</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer>
		<p>&copy; <?PHP echo date('Y'); ?> <a href="mailto:matt@schneenet.com">Matt Schneeberger</a> / SCHNEENET
		</p>
	</footer>
	<script type="text/javascript" src="assets/js/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/app.js"></script>
</body>
</html>
