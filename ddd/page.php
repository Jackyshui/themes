<?php $this->need('header.php'); ?>

    <div class="grid_12" id="content">
        <div class="post">
<div id="headline">
			<h1 class="entry_title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
			<p class="entry_data">
				<span>Publish: <?php $this->date('F j, Y'); ?></span>
				<a style="cursor:pointer" title="查看评论" onclick="$body.animate({scrollTop:jQuery('#comments').offset().top},1000);"><?php $this->commentsNum('No Comments', '1 Comment', '%d Comments'); ?></a>
			</p>
</div>
			<?php $this->content(); ?>
		</div>

		<?php $this->need('comments.php'); ?>
    </div><!-- end #content-->
	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
