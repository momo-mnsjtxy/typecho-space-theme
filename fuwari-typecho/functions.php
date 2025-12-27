<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**
 * Fuwari Theme Functions
 */

/**
 * 主题配置
 */
function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
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

/**
 * 获取主题版本
 */
function themeVersion() {
    return '1.0.0';
}

/**
 * 获取文章缩略图
 */
function showThumbnail($widget) {
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
    $patternMD = '/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png|gif|jpeg|webp))\)/i';
    $patternMDfoot = '/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png|gif|jpeg|webp))/i';
    
    if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
        return $thumbUrl[1][0];
    } else if (preg_match_all($patternMD, $widget->content, $thumbUrl)) {
        return $thumbUrl[1][0];
    } else if (preg_match_all($patternMDfoot, $widget->content, $thumbUrl)) {
        return $thumbUrl[1][0];
    } else {
        return false;
    }
}

/**
 * 获取文章阅读时间
 */
function getReadingTime($content) {
    $word_count = mb_strlen(preg_replace('/\s/', '', html_entity_decode(strip_tags($content))), 'UTF-8');
    $reading_time = ceil($word_count / 300);
    return $reading_time;
}

/**
 * 输出评论
 */
function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
?>
<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
if ($comments->levels > 0) {
    echo ' comment-child';
    echo ' comment-level-' . $comments->levels;
} else {
    echo ' comment-parent';
}
echo $commentClass; 
?>">
    <div id="<?php $comments->theId(); ?>" class="comment-content p-4 mb-4 rounded-lg bg-neutral-50 dark:bg-neutral-800">
        <div class="comment-meta flex items-center mb-3">
            <span class="comment-author font-bold text-neutral-900 dark:text-neutral-100 mr-3">
                <?php $comments->author(); ?>
            </span>
            <span class="comment-time text-sm text-neutral-500 dark:text-neutral-400">
                <?php $comments->date('Y-m-d H:i'); ?>
            </span>
            <span class="comment-reply ml-auto">
                <?php $comments->reply('<span class="text-sm text-[var(--primary)] hover:underline cursor-pointer">Reply</span>'); ?>
            </span>
        </div>
        <div class="comment-text text-neutral-700 dark:text-neutral-300">
            <?php $comments->content(); ?>
        </div>
    </div>
    
    <?php if ($comments->children) { ?>
    <div class="comment-children ml-8">
        <?php $comments->threadedComments($options); ?>
    </div>
    <?php } ?>
</li>
<?php
}
