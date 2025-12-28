<div id="sidebar" class="mb-4 row-start-2 row-end-3 col-span-2 lg:row-start-1 lg:row-end-2 lg:col-span-1 lg:max-w-[17.5rem] onload-animation w-full">
    <div class="flex flex-col w-full gap-4 mb-4">
        <div class="card-base p-3">
            <div class="px-2">
                <div class="font-bold text-xl text-center mb-1 dark:text-neutral-50 transition">
                    <?php $this->options->title(); ?>
                </div>
                <div class="h-1 w-5 bg-[var(--primary)] mx-auto rounded-full mb-2 transition"></div>
                <div class="text-center text-neutral-400 mb-2.5 transition">
                    <?php $this->options->description(); ?>
                </div>
            </div>
        </div>
    </div>

    <div id="sidebar-sticky" class="transition-all duration-700 flex flex-col w-full gap-4 top-4 sticky top-4">
        <!-- Categories Widget -->
        <div class="pb-4 card-base onload-animation" style="animation-delay: 150ms;">
            <div class="font-bold transition text-lg text-neutral-900 dark:text-neutral-100 relative ml-8 mt-4 mb-2 before:w-1 before:h-4 before:rounded-md before:bg-[var(--primary)] before:absolute before:left-[-16px] before:top-[5.5px]">
                Categories
            </div>
            <div class="px-4 overflow-hidden">
                <?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
                <?php while ($categories->next()): ?>
                <a href="<?php $categories->permalink(); ?>" aria-label="View all posts in the <?php $categories->name(); ?> category">
                    <button class="w-full h-10 rounded-lg bg-none hover:bg-[var(--btn-plain-bg-hover)] active:bg-[var(--btn-plain-bg-active)] transition-all pl-2 hover:pl-3 text-neutral-700 hover:text-[var(--primary)] dark:text-neutral-300 dark:hover:text-[var(--primary)]">
                        <div class="flex items-center justify-between relative mr-2">
                            <div class="overflow-hidden text-left whitespace-nowrap overflow-ellipsis">
                                <?php $categories->name(); ?>
                            </div>
                            <div class="transition px-2 h-7 ml-4 min-w-[2rem] rounded-lg text-sm font-bold text-[var(--btn-content)] dark:text-[var(--deep-text)] bg-[var(--btn-regular-bg)] dark:bg-[var(--primary)] flex items-center justify-center">
                                <?php $categories->count(); ?>
                            </div>
                        </div>
                    </button>
                </a>
                <?php endwhile; ?>
            </div>
        </div>

        <!-- Tags Widget -->
        <div class="pb-4 card-base onload-animation" style="animation-delay: 200ms;">
            <div class="font-bold transition text-lg text-neutral-900 dark:text-neutral-100 relative ml-8 mt-4 mb-2 before:w-1 before:h-4 before:rounded-md before:bg-[var(--primary)] before:absolute before:left-[-16px] before:top-[5.5px]">
                Tags
            </div>
            <div class="px-4 overflow-hidden">
                <div class="flex gap-2 flex-wrap">
                    <?php $this->widget('Widget_Metas_Tag_List')->to($tags); ?>
                    <?php while ($tags->next()): ?>
                    <a href="<?php $tags->permalink(); ?>" aria-label="View all posts with the <?php $tags->name(); ?> tag" class="btn-regular h-8 text-sm px-3 rounded-lg">
                        <?php $tags->name(); ?>
                    </a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

        <!-- Recent Posts Widget -->
        <div class="pb-4 card-base onload-animation" style="animation-delay: 250ms;">
            <div class="font-bold transition text-lg text-neutral-900 dark:text-neutral-100 relative ml-8 mt-4 mb-2 before:w-1 before:h-4 before:rounded-md before:bg-[var(--primary)] before:absolute before:left-[-16px] before:top-[5.5px]">
                Recent Posts
            </div>
            <div class="px-4 overflow-hidden">
                <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=5')->to($recent); ?>
                <?php while ($recent->next()): ?>
                <a href="<?php $recent->permalink(); ?>" class="block py-2 text-neutral-700 hover:text-[var(--primary)] dark:text-neutral-300 dark:hover:text-[var(--primary)] transition text-sm">
                    <?php $recent->title(); ?>
                </a>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
