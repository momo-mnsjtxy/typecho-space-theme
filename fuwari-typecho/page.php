<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="absolute w-full z-30 pointer-events-none" style="top: 5.5rem">
    <div class="relative max-w-[var(--page-width)] mx-auto pointer-events-auto">
        <div id="main-grid" class="transition duration-700 w-full left-0 right-0 grid grid-cols-[17.5rem_auto] grid-rows-[auto_1fr_auto] lg:grid-rows-[auto] mx-auto gap-4 px-0 md:px-4">
            
            <?php $this->need('sidebar.php'); ?>
            
            <main id="swup-container" class="transition-swup-fade col-span-2 lg:col-span-1 overflow-hidden">
                <div id="content-wrapper" class="onload-animation">
                    
                    <article class="card-base rounded-[var(--radius-large)] overflow-hidden p-6 md:p-9">
                        <header class="mb-8">
                            <h1 class="font-bold text-4xl md:text-5xl text-neutral-900 dark:text-neutral-100">
                                <?php $this->title(); ?>
                            </h1>
                        </header>
                        
                        <div class="prose dark:prose-invert max-w-none">
                            <?php $this->content(); ?>
                        </div>
                    </article>
                    
                    <?php $this->need('comments.php'); ?>
                    
                </div>
            </main>
            
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>

</body>
</html>
