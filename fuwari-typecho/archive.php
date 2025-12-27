<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="absolute w-full z-30 pointer-events-none" style="top: 5.5rem">
    <div class="relative max-w-[var(--page-width)] mx-auto pointer-events-auto">
        <div id="main-grid" class="transition duration-700 w-full left-0 right-0 grid grid-cols-[17.5rem_auto] grid-rows-[auto_1fr_auto] lg:grid-rows-[auto] mx-auto gap-4 px-0 md:px-4">
            
            <?php $this->need('sidebar.php'); ?>
            
            <main id="swup-container" class="transition-swup-fade col-span-2 lg:col-span-1 overflow-hidden">
                <div id="content-wrapper" class="onload-animation">
                    
                    <div class="card-base rounded-[var(--radius-large)] overflow-hidden p-6 md:p-9 mb-4">
                        <h1 class="font-bold text-4xl md:text-5xl text-neutral-900 dark:text-neutral-100 mb-6">
                            <?php $this->archiveTitle([
                                'category'  =>  _t('分类 %s 下的文章'),
                                'search'    =>  _t('包含关键字 %s 的文章'),
                                'tag'       =>  _t('标签 %s 下的文章'),
                                'author'    =>  _t('%s 发布的文章')
                            ], '', ''); ?>
                        </h1>
                        
                        <?php if ($this->have()): ?>
                        <div class="space-y-4">
                            <?php while($this->next()): ?>
                            <article class="border-b border-neutral-200 dark:border-neutral-700 pb-4 last:border-0">
                                <h2 class="text-2xl font-bold mb-2">
                                    <a href="<?php $this->permalink(); ?>" class="text-neutral-900 dark:text-neutral-100 hover:text-[var(--primary)] dark:hover:text-[var(--primary)] transition">
                                        <?php $this->title(); ?>
                                    </a>
                                </h2>
                                
                                <div class="flex flex-wrap text-neutral-500 dark:text-neutral-400 text-sm gap-4 mb-3">
                                    <span><?php $this->date('Y-m-d'); ?></span>
                                    <?php if($this->categories): ?>
                                    <span><?php $this->category(',', false); ?></span>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="text-neutral-600 dark:text-neutral-300">
                                    <?php $this->excerpt(200, '...'); ?>
                                </div>
                            </article>
                            <?php endwhile; ?>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="mt-8">
                            <?php $this->pageNav('&laquo; Previous', 'Next &raquo;', 1, '...', array('wrapTag' => 'div', 'wrapClass' => 'flex justify-center gap-2', 'itemTag' => 'span', 'textTag' => 'a', 'currentClass' => 'btn-regular px-4 py-2 rounded-lg bg-[var(--primary)] text-white', 'prevClass' => 'btn-regular px-4 py-2 rounded-lg', 'nextClass' => 'btn-regular px-4 py-2 rounded-lg')); ?>
                        </div>
                        
                        <?php else: ?>
                        <p class="text-center text-neutral-500 dark:text-neutral-400 py-8">
                            <?php _e('没有找到内容'); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                    
                </div>
            </main>
            
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>

</body>
</html>
