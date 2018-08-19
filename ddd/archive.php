<?php $this->need('header.php'); ?>

    <div class="grid_12" id="content">
    <?php if ($this->have()): ?>
	<?php while($this->next()): ?>
        <div class="post">
			<h2 class="entry_title"><a href="<?php $this->permalink() ?>" title="<?php echo ucfirst(strtr($this->slug, '-', ' ')); ?>"><?php $this->title() ?></a></h2>
			<p class="entry_data">
				<span>Publish: <?php $this->date('F j, Y'); ?></span>
				<span>Category: <?php $this->category(','); ?></span>
				<a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('No Comments', '1 Comment', '%d Comments'); ?></a>
			</p>
			<?php $this->content('阅读剩余部分...'); ?>
		</div>
	<?php endwhile; ?>
    <?php else: ?>
        <div class="post">
            <h2 class="entry_title"><?php _e('没有找到内容'); ?></h2>
        </div>
    <?php endif; ?>
    <?php $this->pageNav('&#171; PREV','NEXT &#187;'); ?>
    </div><!-- end #content-->
	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
