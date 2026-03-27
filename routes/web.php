<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Public Website Routes — softyfact.tn
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', function () {
    return Inertia::render('Homepage', [
        'productName' => config('app.name'),
    ]);
})->name('home');

// Product pages
Route::get('/product', function () {
    return redirect('/product/offline');
})->name('product');

Route::get('/product/offline', function () {
    return Inertia::render('ProductOffline', [
        'productName' => config('app.name'),
        'orderAmount' => config('app.order_amount', 149),
    ]);
})->name('product.offline');

Route::get('/product/online', function () {
    return Inertia::render('ProductOnline', [
        'productName' => config('app.name'),
        'orderAmount' => config('app.order_amount_online', 99),
    ]);
})->name('product.online');

// Static pages
Route::get('/conditions', function () {
    return Inertia::render('Conditions');
})->name('conditions');

Route::get('/confidentialite', function () {
    return Inertia::render('Confidentialite');
})->name('confidentialite');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

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

// Sitemap
Route::get('/sitemap.xml', function () {
    $urls = [
        ['loc' => 'https://softyfact.tn/', 'priority' => '1.0', 'changefreq' => 'weekly'],
        ['loc' => 'https://softyfact.tn/product/offline', 'priority' => '0.9', 'changefreq' => 'monthly'],
        ['loc' => 'https://softyfact.tn/product/online', 'priority' => '0.9', 'changefreq' => 'monthly'],
        ['loc' => 'https://softyfact.tn/contact', 'priority' => '0.7', 'changefreq' => 'monthly'],
        ['loc' => 'https://softyfact.tn/conditions', 'priority' => '0.3', 'changefreq' => 'yearly'],
        ['loc' => 'https://softyfact.tn/confidentialite', 'priority' => '0.3', 'changefreq' => 'yearly'],
    ];

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
