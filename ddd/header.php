<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh" lang="zh">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="content-type" content="text/html; charset=<?php $this->options->charset(); ?>" />
<title><?php $this->archiveTitle(' &raquo; ', '', ' - '); ?><?php $this->options->title(); if ($this->is('index')) echo ' - ', $this->options->description; $paded = Typecho_Widget::widget('Widget_Archive')->request->page; if ($paded) echo ' - Page ',$paded;?></title>
<link rel="shorcut icon" href="<?php $this->options->themeUrl('images/favicon.ico'); ?>" type="image/x-ico" />

<link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('style.css'); ?>" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('all.js'); ?>"></script>

<?php $this->header(); ?>
</head>

<body>
<div id="header" class="container_16 clearfix">
    <form id="search" method="post" action="">
      <p><input type="submit" class="submit" value="" /><input type="text" name="s" /></p>
    </form>
    <div id="login">
<?php if($this->user->hasLogin()): ?>
        <a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a> | 
        <a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a>
<?php else: ?>
        <a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e(''); ?></a>
<?php endif; ?>
    </div>
    <div id="logo">
<?php $hh = $this->is('single') ? 'div' : 'h1'; ?>
        <<?php echo $hh; ?> id="site_title"><a href="<?php $this->options->siteUrl(); ?>"><?php if ($this->options->logoUrl): ?><img src="<?php $this->options->logoUrl(); ?>" alt="<?php; ?>" /><?php endif; ?><?php; ?></a></<?php echo $hh; ?>>
        <div class="description"><?php $this->options->description() ?></div>
    </div>
</div><!-- end #header -->

<div id="nav_box" class="clearfix">
<ul class="clearfix" id="nav_menu">
    <li<?php if($this->is('index')): ?> class="current"<?php endif; ?>><a href="<?php $this->options->siteUrl(); ?>" title="Home"><?php _e('首页'); ?></a></li>
    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
    <?php while($pages->next()): ?>
    <li<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?>><a href="<?php $pages->permalink(); ?>" title="<?php echo ucfirst($pages->slug); ?>"><?php $pages->title(); ?></a></li>
    <?php endwhile; ?>
</ul>
</div>

<div class="container container_16">
