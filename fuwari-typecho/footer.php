<footer class="relative w-full bg-[var(--card-bg)] transition-all duration-700 max-w-[var(--page-width)] mx-auto px-4 py-6 mt-8 rounded-t-xl">
    <div class="flex flex-col md:flex-row justify-between items-center text-[var(--content-text-color)] text-sm">
        <div class="mb-2 md:mb-0">
            &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>" class="hover:text-[var(--primary)] transition"><?php $this->options->title(); ?></a>. All rights reserved.
        </div>
        <div class="flex items-center space-x-4">
            <span>Powered by <a href="http://typecho.org" target="_blank" class="hover:text-[var(--primary)] transition">Typecho</a></span>
            <span>Theme <a href="https://github.com/saicaca/fuwari" target="_blank" class="hover:text-[var(--primary)] transition">Fuwari</a></span>
        </div>
    </div>
</footer>
