<?php

use App\Livewire\HomePage;
use App\Livewire\ContactPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/contact', ContactPage::class)->name('contact');

Route::get('/robots.txt', function () {
    $content = "User-agent: *\n";
    $content .= "Allow: /\n";
    $content .= 'Sitemap: '.url('/sitemap.xml')."\n";

    return response($content, 200, [
        'Content-Type' => 'text/plain; charset=UTF-8',
    ]);
});

Route::get('/sitemap.xml', function () {
    $pages = [
        [
            'loc' => url('/'),
            'lastmod' => now()->toDateString(),
            'priority' => '1.0',
        ],
        [
            'loc' => route('contact'),
            'lastmod' => now()->toDateString(),
            'priority' => '0.8',
        ],
    ];

    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    foreach ($pages as $page) {
        $xml .= '<url>';
        $xml .= '<loc>'.e($page['loc']).'</loc>';
        $xml .= '<lastmod>'.e($page['lastmod']).'</lastmod>';
        $xml .= '<priority>'.e($page['priority']).'</priority>';
        $xml .= '</url>';
    }

    $xml .= '</urlset>';

    return response($xml, 200, [
        'Content-Type' => 'application/xml; charset=UTF-8',
    ]);
});
