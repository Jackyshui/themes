<?php $this->need('header.php'); ?>

    <div class="grid_12" id="content">
        <div class="post">
<div id="headline">
			<h1 class="entry_title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
			<p class="entry_data">
				<span>Publish: <?php $this->date('F j, Y'); ?></span>
				<span>Category: <?php $this->category(','); ?></span>
				<a style="cursor:pointer" title="查看评论" onclick="$body.animate({scrollTop:jQuery('#comments').offset().top},1000);"><?php $this->commentsNum('No Comments', '1 Comment', '%d Comments'); ?></a>
			</p>
</div>
			<?php $this->content(); ?>
			<p class="tags">Tags: <?php $this->tags(', ', true, 'none'); ?></p>
Related Posts:
<?php $relatedPosts = $this->related(); ?>
<ul>
<?php if ($relatedPosts->have()) : ?>
<?php while ($relatedPosts->next()): ?>
<li><a href="<?php $relatedPosts->permalink(); ?>" title="<?php $relatedPosts->title(); ?>"><?php $relatedPosts->title(); ?></a></li>
<?php endwhile; ?>
<?php else: ?>
<li>[尚无相关文章]</li>
<?php endif; ?>
</ul>
	<div class="page-navigator">
		<span class="nextlink alignright">　<?php $this->theNext('%s &raquo;') ?></span>
		<span class="prevlink"><?php $this->thePrev('&laquo; %s') ?>　</span>
	</div>
		</div>

		<?php $this->need('comments.php'); ?>
    </div><!-- end #content-->
	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
