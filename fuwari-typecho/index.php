<?php
/**
 * Fuwari Theme for Typecho
 * 
 * @package Fuwari Theme
 * @author Fuwari
 * @version 1.0.0
 * @link https://github.com/saicaca/fuwari
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="absolute w-full z-30 pointer-events-none" style="top: 5.5rem">
    <div class="relative max-w-[var(--page-width)] mx-auto pointer-events-auto">
        <div id="main-grid" class="transition duration-700 w-full left-0 right-0 grid grid-cols-[17.5rem_auto] grid-rows-[auto_1fr_auto] lg:grid-rows-[auto] mx-auto gap-4 px-0 md:px-4">
            
            <?php $this->need('sidebar.php'); ?>
            
            <main id="swup-container" class="transition-swup-fade col-span-2 lg:col-span-1 overflow-hidden">
                <div id="content-wrapper" class="onload-animation">
                    <div class="transition flex flex-col rounded-[var(--radius-large)] bg-[var(--card-bg)] py-1 md:py-0 md:bg-transparent md:gap-4 mb-4">
                        
                        <?php $postIndex = 0; ?>
                        <?php while($this->next()): ?>
                        
                        <div class="card-base flex flex-col-reverse md:flex-col w-full rounded-[var(--radius-large)] overflow-hidden relative onload-animation" style="animation-delay: calc(var(--content-delay) + <?php echo $postIndex * 50; ?>ms);">
                            <div class="pl-6 md:pl-9 pr-6 md:pr-2 pt-6 md:pt-7 pb-6 relative w-full">
                                <a href="<?php $this->permalink(); ?>" class="transition group w-full block font-bold mb-3 text-3xl text-90 hover:text-[var(--primary)] dark:hover:text-[var(--primary)] active:text-[var(--title-active)] dark:active:text-[var(--title-active)] before:w-1 before:h-5 before:rounded-md before:bg-[var(--primary)] before:absolute before:top-[35px] before:left-[18px] before:hidden md:before:block">
                                    <?php $this->title(); ?>
                                    <svg width="1em" height="1em" viewBox="0 0 24 24" class="inline text-[2rem] text-[var(--primary)] md:hidden translate-y-0.5 absolute" data-icon="material-symbols:chevron-right-rounded">
                                        <use href="#ai:material-symbols:chevron-right-rounded"></use>
                                    </svg>
                                    <svg width="1em" height="1em" viewBox="0 0 24 24" class="text-[var(--primary)] text-[2rem] transition hidden md:inline absolute translate-y-0.5 opacity-0 group-hover:opacity-100 -translate-x-1 group-hover:translate-x-0" data-icon="material-symbols:chevron-right-rounded">
                                        <use href="#ai:material-symbols:chevron-right-rounded"></use>
                                    </svg>
                                </a>
                                
                                <div class="flex flex-wrap text-neutral-500 dark:text-neutral-400 items-center gap-4 gap-x-4 gap-y-2 mb-4">
                                    <!-- Publish Date -->
                                    <div class="flex items-center">
                                        <div class="meta-icon">
                                            <svg width="1em" height="1em" class="text-xl" data-icon="material-symbols:calendar-today-outline-rounded">
                                                <symbol id="ai:material-symbols:calendar-today-outline-rounded" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V3q0-.425.288-.712T7 2t.713.288T8 3v1h8V3q0-.425.288-.712T17 2t.713.288T18 3v1h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5zM5 8h14V6H5zm0 0V6z"/>
                                                </symbol>
                                                <use href="#ai:material-symbols:calendar-today-outline-rounded"></use>
                                            </svg>
                                        </div>
                                        <span class="text-50 text-sm font-medium"><?php $this->date('Y-m-d'); ?></span>
                                    </div>
                                    
                                    <!-- Category -->
                                    <?php if($this->categories): ?>
                                    <div class="flex items-center">
                                        <div class="meta-icon">
                                            <svg width="1em" height="1em" class="text-xl" data-icon="material-symbols:book-2-outline-rounded">
                                                <symbol id="ai:material-symbols:book-2-outline-rounded" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M6 15.325q.35-.175.725-.25T7.5 15H8V4h-.5q-.625 0-1.062.438T6 5.5zM10 15h8V4h-8zm-4 .325V4zM7.5 22q-1.45 0-2.475-1.025T4 18.5v-13q0-1.45 1.025-2.475T7.5 2H18q.825 0 1.413.587T20 4v12.525q0 .2-.162.363t-.588.362q-.35.175-.55.5t-.2.75t.2.763t.55.487t.55.413t.2.562v.25q0 .425-.288.725T19 22zm0-2h9.325q-.15-.35-.237-.712T16.5 18.5q0-.4.075-.775t.25-.725H7.5q-.65 0-1.075.438T6 18.5q0 .65.425 1.075T7.5 20"/>
                                                </symbol>
                                                <use href="#ai:material-symbols:book-2-outline-rounded"></use>
                                            </svg>
                                        </div>
                                        <div class="flex flex-row flex-nowrap items-center">
                                            <?php $this->category(',', false); ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <!-- Tags -->
                                    <?php if($this->tags): ?>
                                    <div class="items-center hidden md:flex">
                                        <div class="meta-icon">
                                            <svg width="1em" height="1em" class="text-xl" data-icon="material-symbols:tag-rounded">
                                                <symbol id="ai:material-symbols:tag-rounded" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="m9 16l-.825 3.275q-.075.325-.325.525t-.6.2q-.475 0-.775-.375T6.3 18.8L7 16H4.275q-.5 0-.8-.387T3.3 14.75q.075-.35.35-.55t.625-.2H7.5l1-4H5.775q-.5 0-.8-.387T4.8 8.75q.075-.35.35-.55t.625-.2H9l.825-3.275Q9.9 4.4 10.15 4.2t.6-.2q.475 0 .775.375t.175.825L11 8h4l.825-3.275q.075-.325.325-.525t.6-.2q.475 0 .775.375t.175.825L17 8h2.725q.5 0 .8.387t.175.863q-.075.35-.35.55t-.625.2H16.5l-1 4h2.725q.5 0 .8.388t.175.862q-.075.35-.35.55t-.625.2H15l-.825 3.275q-.075.325-.325.525t-.6.2q-.475 0-.775-.375T12.3 18.8L13 16zm.5-2h4l1-4h-4z"/>
                                                </symbol>
                                                <use href="#ai:material-symbols:tag-rounded"></use>
                                            </svg>
                                        </div>
                                        <div class="flex flex-row flex-nowrap items-center">
                                            <?php $this->tags(' / ', true, ''); ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                
                                <!-- Excerpt -->
                                <div class="transition text-75 mb-3.5 pr-4">
                                    <?php $this->excerpt(150, '...'); ?>
                                </div>
                            </div>
                            
                            <a href="<?php $this->permalink(); ?>" aria-label="<?php $this->title(); ?>" class="!hidden md:!flex btn-regular w-[3.25rem] absolute right-3 top-3 bottom-3 rounded-xl bg-[var(--enter-btn-bg)] hover:bg-[var(--enter-btn-bg-hover)] active:bg-[var(--enter-btn-bg-active)] active:scale-95">
                                <svg width="1em" height="1em" viewBox="0 0 24 24" class="transition text-[var(--primary)] text-4xl mx-auto" data-icon="material-symbols:chevron-right-rounded">
                                    <use href="#ai:material-symbols:chevron-right-rounded"></use>
                                </svg>
                            </a>
                        </div>
                        
                        <?php if(!$this->isLast()): ?>
                        <div class="transition border-t-[1px] border-dashed mx-6 border-black/10 dark:border-white/[0.15] last:border-t-0 md:hidden"></div>
                        <?php endif; ?>
                        
                        <?php $postIndex++; ?>
                        <?php endwhile; ?>
                        
                    </div>
                    
                    <!-- Pagination -->
                    <?php $this->pageNav('&laquo; Previous', 'Next &raquo;', 1, '...', array('wrapTag' => 'div', 'wrapClass' => 'flex justify-center gap-2 mt-4', 'itemTag' => 'span', 'textTag' => 'a', 'currentClass' => 'btn-regular px-4 py-2 rounded-lg bg-[var(--primary)] text-white', 'prevClass' => 'btn-regular px-4 py-2 rounded-lg', 'nextClass' => 'btn-regular px-4 py-2 rounded-lg')); ?>
                </div>
            </main>
            
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>
