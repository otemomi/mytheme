<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="keywords" content="">
<meta name="description" content="">

<title><?php wp_title( '::', true, 'right' ); bloginfo('name'); ?></title>

<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>

<!-- OGP -->
<meta property="og:title" content="page_title書く" />
<meta property="og:type" content="blog" />

<meta property="og:site_name" content="site_title書く" />
<meta property="og:description" content="シェア時のテキスト">
<meta property="og:url" content="シェア時のURL" />

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<body id="pageTop">

<header>
	<div id="header">
		<div class="inner">
		<h1 id="logo">
			<a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a>
		</h1>
		<nav>
			<ul id="gNav">
				<li><a href="<?php echo home_url('/'); ?>">log</a></li>
				<li><a href="<?php echo home_url('/'); ?>archives/">archives</a></li>
				<li><a href="<?php echo home_url('/'); ?>about/">about</a></li>
			</ul>
		</nav>
		</div>
	</div>
<?php wp_head(); ?>
</header>