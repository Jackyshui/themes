<?php $this->need('header.php'); ?>

    <div class="grid_12" id="content">
        <div class="post">
            <h2 class="entry_title">404 - <?php _e('页面没找到'); ?></h2>
            <div>
            <form method="post" id="comment_form" action="">
                <div><input type="text" name="s" class="text" />　<input type="submit" class="submit" value=" <?php _e('搜索'); ?> " /></div>
            </form>
            </div><br/>
        </div>

    </div><!-- end #content-->
	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
