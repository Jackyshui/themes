
		<div class="grid_3" id="sidebar">

		<?php if (empty($this->options->sidebarBlock) || in_array('ShowCategory', $this->options->sidebarBlock)): ?>
		<div class="widget">
			<h3>Categories</h3>
						<ul>
								<?php $this->widget('Widget_Metas_Category_List')
								->parse('<li><a href="{permalink}">{name}</a> ({count})</li>'); ?>
						</ul>
		</div>
		<?php endif; ?>

		<?php if (empty($this->options->sidebarBlock) || in_array('ShowArchive', $this->options->sidebarBlock)): ?>
		<div class="widget">
			<h3>Archives</h3>
						<ul>
								<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
								->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
						</ul>
		</div>
		<?php endif; ?>

		<?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
		<div class="widget">
			<h3>Recent Post</h3>
						<ul>
								<?php $this->widget('Widget_Contents_Post_Recent')
								->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
						</ul>
		</div>
		<?php endif; ?>
		
		<?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
		<div class="widget">
			<h3>Recent Comments</h3>
						<ul class="recentcomments">
								<?php $this->widget('Widget_Comments_Recent','ignoreAuthor=true')->to($comments); ?>
								<?php while($comments->next()): ?>
										<li>
												<?php $comments->gravatar(48, 'mm'); ?>
												<a href="<?php $comments->permalink(); ?>" title="on <?php $comments->title(); ?>"><?php $comments->excerpt(50, '...'); ?></a>
										</li>
								<?php endwhile; ?>
						</ul>
		</div>
		<?php endif; ?>

		<?php if (empty($this->options->sidebarBlock) || in_array('ShowOther', $this->options->sidebarBlock)): ?>
		<div class="widget">
			<h3><?php _e('其它'); ?></h3>
						<ul>
								<li><a href="http://validator.w3.org/check/referer">Valid XHTML</a></li>
								<li><a href="http://www.typecho.org">Typecho</a></li>
						</ul>
		</div>
		<?php endif; ?>

		</div><!-- end #sidebar -->
