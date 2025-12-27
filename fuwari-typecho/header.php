<!DOCTYPE html>
<html lang="<?php $this->options->lang(); ?>" class="bg-[var(--page-bg)] transition text-[14px] md:text-[16px]" data-overlayscrollbars-initialize style="--bannerOffset: 15vh;--banner-height-home: 65vh;--banner-height: 35vh;--configHue: 250;--page-width: 75rem;">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php $this->archiveTitle([
        'category'  =>  _t('分类 %s 下的文章'),
        'search'    =>  _t('包含关键字 %s 的文章'),
        'tag'       =>  _t('标签 %s 下的文章'),
        'author'    =>  _t('%s 发布的文章')
    ], '', ' - '); ?><?php $this->options->title(); ?></title>

    <meta name="description" content="<?php if ($this->is('single')) { $this->excerpt(100, ''); } else { $this->options->description(); } ?>">
    <meta name="author" content="<?php $this->author(); ?>">

    <!-- Open Graph -->
    <meta property="og:site_name" content="<?php $this->options->title(); ?>">
    <meta property="og:url" content="<?php $this->permalink(); ?>">
    <meta property="og:title" content="<?php $this->title(); ?>">
    <meta property="og:description" content="<?php if ($this->is('single')) { $this->excerpt(100, ''); } else { $this->options->description(); } ?>">
    <meta property="og:type" content="<?php if ($this->is('post')): ?>article<?php else: ?>website<?php endif; ?>">

    <!-- Favicon -->
    <link rel="icon" href="<?php $this->options->themeUrl('assets/images/favicon/favicon-light-32.png'); ?>" sizes="32x32" media="(prefers-color-scheme: light)">
    <link rel="icon" href="<?php $this->options->themeUrl('assets/images/favicon/favicon-dark-32.png'); ?>" sizes="32x32" media="(prefers-color-scheme: dark)">

    <!-- Theme Initialization Script -->
    <script>
    (function(){
        const DEFAULT_THEME = "auto";
        const LIGHT_MODE = "light";
        const DARK_MODE = "dark";
        const AUTO_MODE = "auto";
        const BANNER_HEIGHT_EXTEND = 30;
        const PAGE_WIDTH = 75;
        const configHue = 250;

        const theme = localStorage.getItem('theme') || DEFAULT_THEME;
        switch (theme) {
            case LIGHT_MODE:
                document.documentElement.classList.remove('dark');
                break
            case DARK_MODE:
                document.documentElement.classList.add('dark');
                break
            case AUTO_MODE:
                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
        }

        const hue = localStorage.getItem('hue') || configHue;
        document.documentElement.style.setProperty('--hue', hue);

        let offset = Math.floor(window.innerHeight * (BANNER_HEIGHT_EXTEND / 100));
        offset = offset - offset % 4;
        document.documentElement.style.setProperty('--banner-height-extend', `${offset}px`);
    })();
    </script>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/Layout.DSulWsr7.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/Layout.y4KPJ9hc.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/_page_.DpTWXJf8.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/_page_.ZlghMKVQ.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/about.BtniRLn_.css'); ?>">

    <style>
    input.svelte-1wah7ro:focus{outline:0}.search-panel.svelte-1wah7ro{max-height:calc(100vh - 100px);overflow-y:auto}#display-setting.svelte-d7tq3k input[type=range]:where(.svelte-d7tq3k){-webkit-appearance:none;height:1.5rem;background-image:var(--color-selection-bar);transition:background-image .15s ease-in-out}#display-setting.svelte-d7tq3k input[type=range]:where(.svelte-d7tq3k)::-webkit-slider-thumb{-webkit-appearance:none;height:1rem;width:.5rem;border-radius:.125rem;background:#ffffffb3;box-shadow:none}#display-setting.svelte-d7tq3k input[type=range]:where(.svelte-d7tq3k)::-webkit-slider-thumb:hover{background:#fffc}#display-setting.svelte-d7tq3k input[type=range]:where(.svelte-d7tq3k)::-webkit-slider-thumb:active{background:#fff9}#display-setting.svelte-d7tq3k input[type=range]:where(.svelte-d7tq3k)::-moz-range-thumb{-webkit-appearance:none;height:1rem;width:.5rem;border-radius:.125rem;border-width:0;background:#ffffffb3;box-shadow:none}#display-setting.svelte-d7tq3k input[type=range]:where(.svelte-d7tq3k)::-moz-range-thumb:hover{background:#fffc}#display-setting.svelte-d7tq3k input[type=range]:where(.svelte-d7tq3k)::-moz-range-thumb:active{background:#fff9}#display-setting.svelte-d7tq3k input[type=range]:where(.svelte-d7tq3k)::-ms-thumb{-webkit-appearance:none;height:1rem;width:.5rem;border-radius:.125rem;background:#ffffffb3;box-shadow:none}#display-setting.svelte-d7tq3k input[type=range]:where(.svelte-d7tq3k)::-ms-thumb:hover{background:#fffc}#display-setting.svelte-d7tq3k input[type=range]:where(.svelte-d7tq3k)::-ms-thumb:active{background:#fff9}
    </style>

    <?php $this->header(); ?>
</head>
<body class="min-h-screen transition <?php if ($this->is('index')): ?>lg:is-home<?php endif; ?>" data-overlayscrollbars-initialize style="--bannerOffset: 15vh;--banner-height-home: 65vh;--banner-height: 35vh;--configHue: 250;--page-width: 75rem;">
    <div id="config-carrier" data-hue="250"></div>

    <div id="top-row" class="z-50 pointer-events-none relative transition-all duration-700 max-w-[var(--page-width)] px-0 md:px-4 mx-auto">
        <div id="navbar-wrapper" class="pointer-events-auto sticky top-0 transition-all">
            <div id="navbar" class="z-50 onload-animation">
                <div class="absolute h-8 left-0 right-0 -top-8 bg-[var(--card-bg)] transition"></div>
                <div class="card-base !overflow-visible max-w-[var(--page-width)] h-[4.5rem] !rounded-t-none mx-auto flex items-center justify-between px-4">
                    <a href="<?php $this->options->siteUrl(); ?>" class="btn-plain scale-animation rounded-lg h-[3.25rem] px-5 font-bold active:scale-95">
                        <div class="flex flex-row text-[var(--primary)] items-center text-md">
                            <svg width="1em" height="1em" class="text-[1.75rem] mb-1 mr-2" data-icon="material-symbols:home-outline-rounded">
                                <symbol id="ai:material-symbols:home-outline-rounded" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M6 19h3v-5q0-.425.288-.712T10 13h4q.425 0 .713.288T15 14v5h3v-9l-6-4.5L6 10zm-2 0v-9q0-.475.213-.9t.587-.7l6-4.5q.525-.4 1.2-.4t1.2.4l6 4.5q.375.275.588.7T20 10v9q0 .825-.588 1.413T18 21h-4q-.425 0-.712-.288T13 20v-5h-2v5q0 .425-.288.713T10 21H6q-.825 0-1.412-.587T4 19m8-6.75"/>
                                </symbol>
                                <use href="#ai:material-symbols:home-outline-rounded"></use>
                            </svg>
                            <?php $this->options->title(); ?>
                        </div>
                    </a>

                    <div class="hidden md:flex">
                        <a aria-label="Home" href="<?php $this->options->siteUrl(); ?>" class="btn-plain scale-animation rounded-lg h-11 font-bold px-5 active:scale-95">
                            <div class="flex items-center">Home</div>
                        </a>
                        <a aria-label="Archive" href="<?php $this->options->siteUrl(); ?>archive/" class="btn-plain scale-animation rounded-lg h-11 font-bold px-5 active:scale-95">
                            <div class="flex items-center">Archive</div>
                        </a>
                        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                        <?php while ($pages->next()): ?>
                        <a aria-label="<?php $pages->title(); ?>" href="<?php $pages->permalink(); ?>" class="btn-plain scale-animation rounded-lg h-11 font-bold px-5 active:scale-95">
                            <div class="flex items-center"><?php $pages->title(); ?></div>
                        </a>
                        <?php endwhile; ?>
                    </div>

                    <div class="flex">
                        <button aria-label="Display Settings" class="btn-plain scale-animation rounded-lg h-11 w-11 active:scale-90" id="display-settings-switch">
                            <svg width="1em" height="1em" class="text-[1.25rem]" data-icon="material-symbols:palette-outline">
                                <symbol id="ai:material-symbols:palette-outline" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 22q-2.05 0-3.875-.788t-3.187-2.15t-2.15-3.187T2 12q0-2.075.813-3.9t2.2-3.175T8.25 2.788T12.2 2q2 0 3.775.688t3.113 1.9t2.125 2.875T22 11.05q0 2.875-1.75 4.413T16 17h-1.85q-.225 0-.312.125t-.088.275q0 .3.375.863t.375 1.287q0 1.25-.687 1.85T12 22m-5.5-9q.65 0 1.075-.425T8 11.5t-.425-1.075T6.5 10t-1.075.425T5 11.5t.425 1.075T6.5 13m3-4q.65 0 1.075-.425T11 7.5t-.425-1.075T9.5 6t-1.075.425T8 7.5t.425 1.075T9.5 9m5 0q.65 0 1.075-.425T16 7.5t-.425-1.075T14.5 6t-1.075.425T13 7.5t.425 1.075T14.5 9m3 4q.65 0 1.075-.425T19 11.5t-.425-1.075T17.5 10t-1.075.425T16 11.5t.425 1.075T17.5 13M12 20q.225 0 .363-.125t.137-.325q0-.35-.375-.825T11.75 17.3q0-1.05.725-1.675T14.25 15H16q1.65 0 2.825-.962T20 11.05q0-3.025-2.312-5.038T12.2 4Q8.8 4 6.4 6.325T4 12q0 3.325 2.338 5.663T12 20"/>
                                </symbol>
                                <use href="#ai:material-symbols:palette-outline"></use>
                            </svg>
                        </button>

                        <button aria-label="Dark Mode Toggle" class="btn-plain scale-animation rounded-lg h-11 w-11 active:scale-90" id="scheme-switch">
                            <svg width="1em" height="1em" class="text-[1.25rem]" data-icon="material-symbols:dark-mode">
                                <symbol id="ai:material-symbols:dark-mode" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 21q-3.75 0-6.375-2.625T3 12q0-3.75 2.625-6.375T12 3q.35 0 .688.025t.662.075q-1.025.725-1.638 1.888T11.1 7.5q0 2.25 1.575 3.825T16.5 12.9q1.375 0 2.525-.613T20.9 10.65q.05.325.075.662T21 12q0 3.75-2.625 6.375T12 21"/>
                                </symbol>
                                <use href="#ai:material-symbols:dark-mode"></use>
                            </svg>
                        </button>

                        <button aria-label="Menu" name="Nav Menu" class="btn-plain scale-animation rounded-lg w-11 h-11 active:scale-90 md:!hidden" id="nav-menu-switch">
                            <svg width="1em" height="1em" class="text-[1.25rem]" data-icon="material-symbols:menu-rounded">
                                <symbol id="ai:material-symbols:menu-rounded" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M4 18q-.425 0-.712-.288T3 17t.288-.712T4 16h16q.425 0 .713.288T21 17t-.288.713T20 18zm0-5q-.425 0-.712-.288T3 12t.288-.712T4 11h16q.425 0 .713.288T21 12t-.288.713T20 13zm0-5q-.425 0-.712-.288T3 7t.288-.712T4 6h16q.425 0 .713.288T21 7t-.288.713T20 8z"/>
                                </symbol>
                                <use href="#ai:material-symbols:menu-rounded"></use>
                            </svg>
                        </button>
                    </div>

                    <div id="nav-menu-panel" class="float-panel float-panel-closed absolute transition-all fixed right-4 px-2 py-2">
                        <a href="<?php $this->options->siteUrl(); ?>" class="group flex justify-between items-center py-2 pl-3 pr-1 rounded-lg gap-8 hover:bg-[var(--btn-plain-bg-hover)] active:bg-[var(--btn-plain-bg-active)] transition">
                            <div class="transition text-black/75 dark:text-white/75 font-bold group-hover:text-[var(--primary)] group-active:text-[var(--primary)]">Home</div>
                        </a>
                        <a href="<?php $this->options->siteUrl(); ?>archive/" class="group flex justify-between items-center py-2 pl-3 pr-1 rounded-lg gap-8 hover:bg-[var(--btn-plain-bg-hover)] active:bg-[var(--btn-plain-bg-active)] transition">
                            <div class="transition text-black/75 dark:text-white/75 font-bold group-hover:text-[var(--primary)] group-active:text-[var(--primary)]">Archive</div>
                        </a>
                        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                        <?php while ($pages->next()): ?>
                        <a href="<?php $pages->permalink(); ?>" class="group flex justify-between items-center py-2 pl-3 pr-1 rounded-lg gap-8 hover:bg-[var(--btn-plain-bg-hover)] active:bg-[var(--btn-plain-bg-active)] transition">
                            <div class="transition text-black/75 dark:text-white/75 font-bold group-hover:text-[var(--primary)] group-active:text-[var(--primary)]"><?php $pages->title(); ?></div>
                        </a>
                        <?php endwhile; ?>
                    </div>

                    <div id="display-setting" class="float-panel float-panel-closed absolute transition-all fixed right-4 px-4 py-4 rounded-xl">
                        <div class="font-bold text-lg mb-4">Display Settings</div>
                        <div class="mb-4">
                            <label class="block mb-2">Theme</label>
                            <select id="theme-select" class="w-full px-3 py-2 rounded-lg bg-[var(--btn-regular-bg)] text-[var(--btn-content)]">
                                <option value="auto">Auto</option>
                                <option value="light">Light</option>
                                <option value="dark">Dark</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <script>
            function toggleDarkMode(){
                if (localStorage.theme==="dark"){
                    document.documentElement.classList.remove("dark");
                    localStorage.theme="light";
                } else {
                    document.documentElement.classList.add("dark");
                    localStorage.theme="dark";
                }
            }

            function initNav(){
                let schemeSwitch = document.getElementById("scheme-switch");
                if (schemeSwitch){
                    schemeSwitch.onclick = function(){
                        toggleDarkMode();
                    };
                }

                let displaySettingsSwitch = document.getElementById("display-settings-switch");
                if (displaySettingsSwitch){
                    displaySettingsSwitch.onclick = function(){
                        let panel = document.getElementById("display-setting");
                        if (panel) panel.classList.toggle("float-panel-closed");
                    };
                }

                let navMenuSwitch = document.getElementById("nav-menu-switch");
                if (navMenuSwitch){
                    navMenuSwitch.onclick = function(){
                        let panel = document.getElementById("nav-menu-panel");
                        if (panel) panel.classList.toggle("float-panel-closed");
                    };
                }
            }
            initNav();
            </script>
        </div>
    </div>
