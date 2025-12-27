<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
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

<?php } ?>

<div id="comments" class="card-base rounded-[var(--radius-large)] overflow-hidden p-6 md:p-9 mt-4">
    <h3 class="font-bold text-2xl text-neutral-900 dark:text-neutral-100 mb-6">
        <?php $this->commentsNum(_t('暂无评论'), _t('仅有 1 条评论'), _t('已有 %d 条评论')); ?>
    </h3>
    
    <?php if ($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond mb-8">
        <div class="cancel-comment-reply">
            <?php $this->cancelReply('<small class="text-sm text-neutral-500 hover:text-[var(--primary)]">取消回复</small>'); ?>
        </div>

        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form" class="space-y-4">
            <?php if($this->user->hasLogin()): ?>
            <p class="text-neutral-600 dark:text-neutral-300">
                Logged in as <a href="<?php $this->options->profileUrl(); ?>" class="text-[var(--primary)] hover:underline"><?php $this->user->screenName(); ?></a>. 
                <a href="<?php $this->options->logoutUrl(); ?>" title="Logout" class="text-[var(--primary)] hover:underline">Logout &raquo;</a>
            </p>
            <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <input type="text" name="author" id="author" class="px-4 py-2 rounded-lg border border-neutral-300 dark:border-neutral-600 bg-white dark:bg-neutral-800 text-neutral-900 dark:text-neutral-100 focus:outline-none focus:border-[var(--primary)]" placeholder="Name *" value="<?php $this->remember('author'); ?>" required />
                <input type="email" name="mail" id="mail" class="px-4 py-2 rounded-lg border border-neutral-300 dark:border-neutral-600 bg-white dark:bg-neutral-800 text-neutral-900 dark:text-neutral-100 focus:outline-none focus:border-[var(--primary)]" placeholder="Email *" value="<?php $this->remember('mail'); ?>" required />
                <input type="url" name="url" id="url" class="px-4 py-2 rounded-lg border border-neutral-300 dark:border-neutral-600 bg-white dark:bg-neutral-800 text-neutral-900 dark:text-neutral-100 focus:outline-none focus:border-[var(--primary)]" placeholder="Website" value="<?php $this->remember('url'); ?>" />
            </div>
            <?php endif; ?>
            
            <textarea rows="5" cols="50" name="text" id="textarea" class="w-full px-4 py-2 rounded-lg border border-neutral-300 dark:border-neutral-600 bg-white dark:bg-neutral-800 text-neutral-900 dark:text-neutral-100 focus:outline-none focus:border-[var(--primary)] resize-vertical" placeholder="Your comment here..." required><?php $this->remember('text'); ?></textarea>
            
            <button type="submit" class="btn-regular px-6 py-2 rounded-lg bg-[var(--primary)] text-white hover:opacity-90 active:scale-95 transition">
                Submit Comment
            </button>
        </form>
    </div>
    <?php else: ?>
    <p class="text-center text-neutral-500 dark:text-neutral-400 py-4">Comments are closed.</p>
    <?php endif; ?>

    <?php if ($this->commentsNum > 0): ?>
    <div id="comment-list" class="comment-list">
        <ol class="comment-list-ol list-none p-0">
            <?php $this->comments()->to($comments); ?>
            <?php while($comments->next()): ?>
                <?php $comments->threadedComments(); ?>
            <?php endwhile; ?>
        </ol>
        
        <?php $this->commentsPageNav('&laquo; Previous', 'Next &raquo;', 1, '...', array('wrapTag' => 'div', 'wrapClass' => 'flex justify-center gap-2 mt-6', 'itemTag' => 'span', 'textTag' => 'a', 'currentClass' => 'btn-regular px-4 py-2 rounded-lg bg-[var(--primary)] text-white', 'prevClass' => 'btn-regular px-4 py-2 rounded-lg', 'nextClass' => 'btn-regular px-4 py-2 rounded-lg')); ?>
    </div>
    <?php endif; ?>
</div>
