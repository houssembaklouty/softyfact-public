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

// Homepage
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

Route::get('/order-confirmation/{order:confirmation_token}', [OrderController::class, 'confirmation'])
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
    $urls = [
        ['loc' => 'https://softyfact.tn/', 'priority' => '1.0', 'changefreq' => 'weekly'],
        ['loc' => 'https://softyfact.tn/product/offline', 'priority' => '0.9', 'changefreq' => 'monthly'],
        ['loc' => 'https://softyfact.tn/product/online', 'priority' => '0.9', 'changefreq' => 'monthly'],
        ['loc' => 'https://softyfact.tn/contact', 'priority' => '0.7', 'changefreq' => 'monthly'],
        ['loc' => 'https://softyfact.tn/conditions', 'priority' => '0.3', 'changefreq' => 'yearly'],
        ['loc' => 'https://softyfact.tn/confidentialite', 'priority' => '0.3', 'changefreq' => 'yearly'],
        ['loc' => 'https://softyfact.tn/blog', 'priority' => '0.8', 'changefreq' => 'weekly'],
    ];

    // Add published blog posts to sitemap
    $blogPosts = BlogPost::published()->orderByDesc('published_at')->get();
    foreach ($blogPosts as $post) {
        $urls[] = [
            'loc' => 'https://softyfact.tn/blog/' . $post->slug,
            'priority' => '0.7',
            'changefreq' => 'monthly',
        ];
    }

    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    foreach ($urls as $url) {
        $xml .= '<url>';
        $xml .= '<loc>' . htmlspecialchars($url['loc'], ENT_XML1) . '</loc>';
        $xml .= '<lastmod>' . date('Y-m-d') . '</lastmod>';
        $xml .= '<changefreq>' . $url['changefreq'] . '</changefreq>';
        $xml .= '<priority>' . $url['priority'] . '</priority>';
        $xml .= '</url>';
    }
    $xml .= '</urlset>';

    return response($xml, 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');
