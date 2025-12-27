<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="absolute w-full z-30 pointer-events-none" style="top: 5.5rem">
    <div class="relative max-w-[var(--page-width)] mx-auto pointer-events-auto">
        <div id="main-grid" class="transition duration-700 w-full left-0 right-0 grid grid-cols-[17.5rem_auto] grid-rows-[auto_1fr_auto] lg:grid-rows-[auto] mx-auto gap-4 px-0 md:px-4">
            
            <?php $this->need('sidebar.php'); ?>
            
            <main id="swup-container" class="transition-swup-fade col-span-2 lg:col-span-1 overflow-hidden">
                <div id="content-wrapper" class="onload-animation">
                    
                    <article class="card-base rounded-[var(--radius-large)] overflow-hidden p-6 md:p-9">
                        <!-- Post Header -->
                        <header class="mb-8">
                            <h1 class="font-bold text-4xl md:text-5xl text-neutral-900 dark:text-neutral-100 mb-4">
                                <?php $this->title(); ?>
                            </h1>
                            
                            <div class="flex flex-wrap text-neutral-500 dark:text-neutral-400 items-center gap-4 mb-4">
                                <!-- Publish Date -->
                                <div class="flex items-center">
                                    <svg width="1em" height="1em" class="text-xl mr-2" data-icon="material-symbols:calendar-today-outline-rounded">
                                        <use href="#ai:material-symbols:calendar-today-outline-rounded"></use>
                                    </svg>
                                    <span class="text-sm"><?php $this->date('F j, Y'); ?></span>
                                </div>
                                
                                <!-- Author -->
                                <div class="flex items-center">
                                    <svg width="1em" height="1em" class="text-xl mr-2" data-icon="material-symbols:person-outline">
                                        <symbol id="ai:material-symbols:person-outline" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M12 12q-1.65 0-2.825-1.175T8 8t1.175-2.825T12 4t2.825 1.175T16 8t-1.175 2.825T12 12m-8 8v-2.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13t3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20zm2-2h12v-.8q0-.275-.137-.5t-.363-.35q-1.35-.675-2.725-1.012T12 15t-2.775.338T6.5 16.35q-.225.125-.363.35T6 17.2zm6-8q.825 0 1.413-.587T14 8t-.587-1.412T12 6t-1.412.588T10 8t.588 1.413T12 10m0 8"/>
                                        </symbol>
                                        <use href="#ai:material-symbols:person-outline"></use>
                                    </svg>
                                    <span class="text-sm"><?php $this->author(); ?></span>
                                </div>
                                
                                <!-- Category -->
                                <?php if($this->categories): ?>
                                <div class="flex items-center">
                                    <svg width="1em" height="1em" class="text-xl mr-2" data-icon="material-symbols:book-2-outline-rounded">
                                        <use href="#ai:material-symbols:book-2-outline-rounded"></use>
                                    </svg>
                                    <?php $this->category(',', false); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Tags -->
                            <?php if($this->tags): ?>
                            <div class="flex flex-wrap gap-2 mt-4">
                                <?php $this->tags('<span class="btn-regular h-8 text-sm px-3 rounded-lg inline-block">', true, '</span>'); ?>
                            </div>
                            <?php endif; ?>
                        </header>
                        
                        <!-- Post Content -->
                        <div class="prose dark:prose-invert max-w-none mb-8">
                            <?php $this->content(); ?>
                        </div>
                        
                        <!-- Post Navigation -->
                        <nav class="flex justify-between items-center pt-6 border-t border-neutral-200 dark:border-neutral-700">
                            <div class="flex-1">
                                <?php $this->thePrev('<span class="btn-regular px-4 py-2 rounded-lg">← %s</span>'); ?>
                            </div>
                            <div class="flex-1 text-right">
                                <?php $this->theNext('<span class="btn-regular px-4 py-2 rounded-lg">%s →</span>'); ?>
                            </div>
                        </nav>
                    </article>
                    
                    <!-- Comments Section -->
                    <?php $this->need('comments.php'); ?>
                    
                </div>
            </main>
            
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>
