<?php

/* 後台設置外觀 */
function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, Typecho_Widget::widget('Widget_Options')->siteUrl.'usr/themes/dddefault/images/rabbit-logo.png', _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($logoUrl);

    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));

    $form->addInput($sidebarBlock->multiMode());
}

/* 自定義評論結構 */
function threadedComments($comments, $options) {
?>
<li id="<?php $comments->theId(); ?>" class="comment-body<?php
    if ($comments->levels) {
        echo ' comment-child';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
?>">
    <div class="comment-meta">
        <a href="<?php $comments->permalink(); ?>"><?php $options->beforeDate();
        $comments->date($options->dateFormat);
        $options->afterDate(); ?></a>
    </div>
    <div class="comment-author">
        <?php $comments->gravatar(48, 'mm'); ?>
        <span<?php if ($comments->authorId == $comments->ownerId) echo ' class="comment-by-author"'; ?>><?php $comments->author(); ?></span>
    </div>

    <?php $comments->content(); ?>
    <div id="reply-to-<?php $comments->coid(); ?>" class="comment-reply">
        <?php $comments->reply($options->replyWord); ?>
    </div>
    <?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
    <?php } ?>

</li>
<?php
}
