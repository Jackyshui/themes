<div id="comments">
            <?php $this->comments()->to($comments); ?>
            <?php if ($comments->have()): ?>
			<h4><?php $this->commentsNum('No Comments', '1 Comment', '%d Comments'); ?> <a style="cursor:pointer" title="我要评论" onclick="$body.animate({scrollTop:jQuery('#response').offset().top},1000);">&raquo;</a></h4>
            
            <?php $comments->pageNav('&#171; PREV','NEXT &#187;'); ?>
            
            <?php $comments->listComments(); ?>
            
            <?php endif; ?>

            <?php if($this->allow('comment')): ?>
            <div id="<?php $this->respondId(); ?>" class="respond">
            
            <div class="cancel-comment-reply">
            <?php $comments->cancelReply(); ?>
            </div>
            
			<h4 id="response">Leave a Comment</h4>
			<form method="post" action="<?php $this->commentUrl() ?>" id="comment_form">
		<?php if ( $this->user->hasLogin() ): ?>
			<p>欢迎: <a href="<?php $this->options->adminUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('登出'); ?> &raquo;</a></p>
		<?php elseif ( Typecho_Cookie::get('__typecho_remember_author') ): ?>
				<div class="toggle-info"><?php _e('欢迎: '); ?><span> <?php $this->remember('author'); ?> </span>
				<a href="javascript:toggleCommentAuthorInfo();" id="toggle-comment-author-info">(修改)</a></div>
<script type="text/javascript">
//<![CDATA[
var changeMsg = "(修改)";
var closeMsg = "(缩回)";

function toggleCommentAuthorInfo() {
  jQuery('#comment-author-info').slideToggle(200, function(){
    if ( jQuery('#comment-author-info').css('display') == 'none' ) {
      jQuery('#toggle-comment-author-info').text(changeMsg);
    } else {
      jQuery('#toggle-comment-author-info').text(closeMsg);
    }
  });
}
jQuery(document).ready(function(){
  jQuery('#comment-author-info').hide();
});
//]]>
</script>
		<?php endif; ?>

	<?php if ( !$this->user->hasLogin() ): ?>
<div id="comment-author-info">
				<p><input type="text" name="author" id="author" class="text" value="<?php $this->remember('author'); ?>" /><label for="author">Name (required)</label></p>
				<p><input type="text" name="mail" id="mail" class="text" value="<?php $this->remember('mail'); ?>" /><label for="mail">Email (will not be published, required)</label></p>
				<p><input type="text" name="url" id="url" class="text" value="<?php $this->remember('url'); ?>" /><label for="url">Website</label></p>
</div>
  <?php endif; ?>
				<p><textarea rows="5" cols="50" id="comment" name="text" class="textarea" onkeydown="if(event.ctrlKey&amp;&amp;event.keyCode==13){document.getElementById('submit').click();return false};"><?php $this->remember('text'); ?></textarea></p>
				<p><input type="submit" value="Submit Comment" id="submit" class="submit" /></p>
			</form>
            </div>

            <?php else: ?>
            <h4><?php _e('评论已关闭'); ?></h4>
            <?php endif; ?>

<?php
$pintracks = $this->db->fetchAll($this->db->select('coid', 'created', 'author', 'url')
             ->from('table.comments')
             ->where('type != ?', 'comment')
             ->where('cid = ?', $this->cid)
             );
if ( $pintracks ): ?>
		<h3 id="pings">Trackbacks/Pingbacks</h3>
		<ol class="pinglist">
		<?php foreach( $pintracks as $pintrack ){ ?>
			<li id="comment-<?php echo $pintrack['coid']; ?>" class="comment-body"><cite><a href="<?php echo $pintrack['url']; ?>"><?php echo $pintrack['author']; ?></a></cite> <span class="pindate"> --- <?php echo date($this->options->commentDateFormat, $pintrack['created']); ?></span></li>
		<?php } ?>
		</ol>
		<br/><br/>
<?php endif; ?>

		</div>
