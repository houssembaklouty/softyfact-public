<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\OrderController;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Website Routes — softyfact.tn
|--------------------------------------------------------------------------
*/

$shared = [
    'productName' => config('app.name'),
    'coreAppUrl' => config('app.core_app_url', 'https://app.softyfact.tn'),
    'supportPhone' => config('app.support_phone', '55 123 456'),
    'offlinePrice' => config('app.order_amount', 149),
    'onlinePrice' => config('app.order_amount_online', 99),
    'monthlyPrice' => number_format(config('app.order_amount_online', 99) / 12, 2),
];

// Homepage (A/B tested)
Route::get('/', function () use ($shared) {
    return view('pages.homepage', $shared);
})->name('home');

// Product pages
Route::get('/product', function () {
    return redirect('/product/offline');
})->name('product');

Route::get('/product/offline', function () use ($shared) {
    return view('pages.product-offline', array_merge($shared, [
        'pagePrice' => config('app.order_amount', 149),
    ]));
})->name('product.offline');

Route::get('/product/online', function () use ($shared) {
    $onlinePrice = config('app.order_amount_online', 99);
    return view('pages.product-online', array_merge($shared, [
        'pagePrice' => $onlinePrice,
        'monthlyPrice' => number_format($onlinePrice / 12, 2),
    ]));
})->name('product.online');

// Static pages
Route::get('/conditions', function () use ($shared) {
    return view('pages.conditions', $shared);
})->name('conditions');

Route::get('/confidentialite', function () use ($shared) {
    return view('pages.confidentialite', $shared);
})->name('confidentialite');

Route::get('/contact', function () use ($shared) {
    return view('pages.contact', $shared);
})->name('contact');

// Locale switch
Route::get('/locale/{locale}', function (string $locale) {
    if (in_array($locale, ['fr', 'ar'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return back();
})->name('locale.switch');

// Order submission (public, throttled)
Route::post('/orders', [OrderController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('orders.store');

Route::get('/order-confirmation/{token}', [OrderController::class, 'confirmation'])
    ->where('token', '[0-9]{8}')
    ->name('orders.confirmation');

// Lead capture (public, throttled)
Route::post('/leads', [LeadController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('leads.store');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

// Sitemap
Route::get('/sitemap.xml', function () {
    $base = 'https://softyfact.tn';

    $urls = [
        ['loc' => $base . '/', 'lastmod' => '2026-03-01', 'priority' => '1.0', 'changefreq' => 'weekly'],
        ['loc' => $base . '/product/offline', 'lastmod' => '2026-03-01', 'priority' => '0.9', 'changefreq' => 'monthly'],
        ['loc' => $base . '/product/online', 'lastmod' => '2026-03-01', 'priority' => '0.9', 'changefreq' => 'monthly'],
        ['loc' => $base . '/contact', 'lastmod' => '2026-03-01', 'priority' => '0.7', 'changefreq' => 'monthly'],
        ['loc' => $base . '/conditions', 'lastmod' => '2026-02-28', 'priority' => '0.3', 'changefreq' => 'yearly'],
        ['loc' => $base . '/confidentialite', 'lastmod' => '2026-02-28', 'priority' => '0.3', 'changefreq' => 'yearly'],
        ['loc' => $base . '/blog', 'lastmod' => date('Y-m-d'), 'priority' => '0.8', 'changefreq' => 'weekly'],
    ];

    $blogPosts = BlogPost::published()->orderByDesc('published_at')->get();
    foreach ($blogPosts as $post) {
        $urls[] = [
            'loc' => $base . '/blog/' . $post->slug,
            'lastmod' => $post->updated_at->toDateString(),
            'priority' => '0.7',
            'changefreq' => 'monthly',
            'image' => $post->cover_image ? $base . $post->cover_image : null,
            'image_title' => $post->title_fr,
        ];
    }

    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
    $xml .= ' xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">';
    foreach ($urls as $url) {
        $xml .= '<url>';
        $xml .= '<loc>' . htmlspecialchars($url['loc'], ENT_XML1) . '</loc>';
        $xml .= '<lastmod>' . $url['lastmod'] . '</lastmod>';
        $xml .= '<changefreq>' . $url['changefreq'] . '</changefreq>';
        $xml .= '<priority>' . $url['priority'] . '</priority>';
        if (!empty($url['image'])) {
            $xml .= '<image:image>';
            $xml .= '<image:loc>' . htmlspecialchars($url['image'], ENT_XML1) . '</image:loc>';
            $xml .= '<image:title>' . htmlspecialchars($url['image_title'], ENT_XML1) . '</image:title>';
            $xml .= '</image:image>';
        }
        $xml .= '</url>';
    }
    $xml .= '</urlset>';

    return response($xml, 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');
