<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::published()
            ->orderByDesc('published_at')
            ->paginate(30);

        $shared = [
            'productName' => config('app.name'),
            'coreAppUrl' => config('app.core_app_url', 'https://app.softyfact.tn'),
            'supportPhone' => config('app.support_phone', '55 123 456'),
            'pagePrice' => config('app.order_amount_online', 119),
            'monthlyPrice' => number_format(config('app.order_amount_online', 119) / 12, 2),
        ];

        return view('pages.blog-index', array_merge($shared, [
            'posts' => $posts,
        ]));
    }

    public function show(BlogPost $post)
    {
        if (!$post->published_at || $post->published_at->isFuture()) {
            abort(404);
        }

        $related = BlogPost::published()
            ->where('id', '!=', $post->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        $shared = [
            'productName' => config('app.name'),
            'coreAppUrl' => config('app.core_app_url', 'https://app.softyfact.tn'),
            'supportPhone' => config('app.support_phone', '55 123 456'),
            'pagePrice' => config('app.order_amount_online', 119),
            'monthlyPrice' => number_format(config('app.order_amount_online', 119) / 12, 2),
        ];

        return view('pages.blog-show', array_merge($shared, [
            'post' => $post,
            'related' => $related,
        ]));
    }
}
