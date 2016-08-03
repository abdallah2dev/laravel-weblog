<?php

return [
    'blog-route-name' => 'blog',
    'rss-route-name' => 'blog/rss',
    'sitemap-route-name' => 'blog/sitemap',
    'user-model' => config('auth.model') ?? config('auth.providers.users.model') ?? null,
    'layout-view' => 'layouts.app',
    'title' => 'Blog',
    'copyright-notice' => '&copy; ' . date("Y") . ". All Rights reserved.",
];
